<?php
namespace TestWorkshop\Model;

use Slim\PDO\Database;

class Article
{
    /**
     * @var \Slim\PDO\Database
     */
    private $db;

    /**
     * Article constructor.
     *
     * @param \Slim\PDO\Database $db
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * @return array
     */
    public function find()
    {
        return $this->db->select()->from('articles')->execute()->fetchAll();
    }

    /**
     * @param array $article
     *
     * @return string
     */
    public function store(array $article)
    {
        if (\array_key_exists('id', $article)) {
            return $this->db->update($article)->table('articles')->where('id', '=', $article['id'])->execute();
        } else {
            return $this->db->insert($article)->into('articles')->execute();
        }
    }

    public function fetch($id)
    {
        return $this->db->select()->from('articles')->where('id', '=', $id)->execute()->fetch();
    }

    public function delete($id)
    {
        return $this->db->delete('articles')->where('id', '=', $id)->execute();
    }
}
