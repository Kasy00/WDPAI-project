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
        $stmt = $this->database->connect()->prepare('
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
    }

    public function updateUserAvatar(string $email, string $avatarPath){
        $stmt = $this->database->connect()->prepare('
            UPDATE public.users SET avatar_path = :avatarPath WHERE email = :email
        ');

        $stmt->bindParam(':avatarPath', $avatarPath, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
    }
}