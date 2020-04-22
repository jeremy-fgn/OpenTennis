<?php

require_once(PATH_DAO);
require_once(PATH_ENTITY . 'User.php');

class UserDAO extends DAO
{

    public function registerUser($user)
    {
        $sql = 'INSERT INTO Users VALUES(?, ?, ?, ?, ?, ?)';
        $args = array(
            $user->getidUser(),
            $user->getnom(),
            $user->getprenom(),
            $user->getMail(),
            $user->getMail(),
            $user->getPassword()
        );
        $res = DAO::queryExec($sql, $args);
    }

    public function deleteUser($id)
    {
        // A FAIRE
    }

    public function isAdmin($id)
    {
        $sql = "SELECT * FROM Admin WHERE idUser = ?";
        $args = array($id);
        $req = DAO::queryRow($sql, $args);
        if ($req == false) {
            return false;
        }
        return true;
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM Users";
        $req = DAO::queryAll($sql);
        if ($req == false) {
            $users = array();
        } else {
            foreach ($req as $user) {
                $users[] = new User(
                    $user['idUser'],
                    $user['nom'],
                    $user['prenom'],
                    $user['mail'],
                    $user['login'],
                    $user['password'],
                    UserDAO::isAdmin($user['idUser'])
                );
            }
        }

        return $users;
    }

    public function verifierMail($mail)
    {
        $sql = "SELECT * FROM Users WHERE mail = ?";
        $args = array($mail);
        $req = DAO::queryRow($sql, $args);
        if ($req == false) {
            return false;
        }
        $user = new User($req['idUser'], $req['nom'], $req['prenom'], $req['mail'], $req['login'], $req['password']);
        if (UserDAO::isAdmin($user->getidUser())) {
            $user->setIsAdmin(true);
        }
        return $user;
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM Users WHERE idUser = ?";
        $args = array($id);
        $req = DAO::queryRow($sql, $args);
        if ($req == false) {
            return false;
        }
        $user = new User($req['idUser'], $req['nom'], $req['prenom'], $req['mail'], $req['password']);
        if (UserDAO::isAdmin($user->getidUser())) {
            $user->setIsAdmin(true);
        }
        return $user;
    }

    public function setAdmin($user)
    {
        $user->setIsAdmin(true);
        $sql = 'INSERT INTO Admin VALUES(?, ?)';
        $args = array(
            0,
            $user->getidUser()
        );

        $res = DAO::queryExec($sql, $args);
    }

    public function unsetAdmin($user)
    {
        $user->setIsAdmin(false);
        $sql = 'DELETE FROM Admin WHERE idUser = ?';
        $args = array($user->getidUser());
        $res = DAO::queryExec($sql, $args);
    }

    public function mailExist($mail)
    {
        $sql = "SELECT count(*) as nb FROM Users WHERE mail = ?";
        $req = DAO::queryRow($sql, array($mail));
        return $req['nb'];
    }
}
