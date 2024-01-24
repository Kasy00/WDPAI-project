<?php

require_once "Repository.php";
require_once __DIR__."/../models/User.php";

class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false){
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['avatar_path']
        );
    }

    public function addUser(User $user){
        $pdo = $this->database->connect();
        $pdo->beginTransaction();

        try {
            $stmt = $pdo->prepare('
                INSERT INTO public.users (name, surname, email, password, avatar_path)
                VALUES (?, ?, ?, ?, ?)
            ');

            $stmt->execute([
                $user->getName(),
                $user->getSurname(),
                $user->getEmail(),
                $user->getPassword(),
                $user->getAvatarPath()
            ]);

            $pdo->commit();
        } catch (Exception $e) {
            $pdo->rollBack();
            throw $e;
        }
    }

    public function getUserIdByEmail(string $email): ?int{
        $stmt = $this->database->connect()->prepare('
            SELECT id FROM users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return ($result !== false) ? (int)$result['id'] : null;
    }

    public function updateUserAvatar(string $email, string $avatarPath){
        $stmt = $this->database->connect()->prepare('
            SELECT update_user_avatar(:email, :avatarPath)
        ');

        $stmt->bindParam(':avatarPath', $avatarPath, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function updateBMI($userID, $bmi){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.user_details (user_id, bmi, last_bmi_calculation)
            VALUES (:userId, :bmi, NOW())
            ON CONFLICT (user_id) DO UPDATE 
            SET bmi = :bmi, last_bmi_calculation = NOW()
        ');

        $stmt->bindParam(':bmi', $bmi, PDO::PARAM_STR);
        $stmt->bindParam(':userId', $userID, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getBMI(string $email): ?float{
        $stmt = $this->database->connect()->prepare('
            SELECT bmi FROM users JOIN user_details ud on users.id = ud.user_id WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return ($result !== false) ? (float)$result['bmi'] : null;
    }
}