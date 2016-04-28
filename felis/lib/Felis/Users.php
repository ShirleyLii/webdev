<?php
namespace Felis;

/**
 * Manage users in our system.
 */
class Users extends Table {

    /**
     * Constructor
     * @param $site The Site object
     */
    public function __construct(Site $site) {
        parent::__construct($site, "user");
    }

    /**
     * Test for a valid login.
     * @param $email User email
     * @param $password Password credential
     * @returns User object if successful, null otherwise.
     */
    public function login($email, $password) {
        $sql =<<<SQL
SELECT * from $this->tableName
where email=? and password=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($email, $password));
        if($statement->rowCount() === 0) {
            return null;
        }

        return new User($statement->fetch(\PDO::FETCH_ASSOC));
    }

    /**
     * Get a user based on the id
     * @param $id ID of the user
     * @returns User object if successful, null otherwise.
     */
    public function get($id) {
        $sql =<<<SQL
SELECT * from $this->tableName
where id=$id
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($id));
        if($statement->rowCount() === 0) {
            return null;
        }
        return new User($statement->fetch(\PDO::FETCH_ASSOC));
    }

    public function update(User $user) {
        if ( $this->get($user->getId()) === null) { return false; }
        $sql =<<<SQL
UPDATE $this->tableName
SET name=?, phone=?, email=?, address=?, notes=?, role=?
where id=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        try {
            $statement->execute(array($user->getName(), $user->getPhone(), $user->getEmail(),
                $user->getAddress(), $user->getNotes(), $user->getRole(), $user->getId()));
            return true;
        }
        catch (\PDOException $e) {
            return false;
        }
        return new User($statement->fetch(\PDO::FETCH_ASSOC));
    }
}
