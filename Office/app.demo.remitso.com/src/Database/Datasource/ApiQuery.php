<?php
namespace App\Database\Datasource;
use Cake\Datasource\QueryInterface;
use Cake\Datasource\RepositoryInterface;

/**
 * Class ApiQuery
 * @package App\Database\Datasource
 * @method $this andWhere($conditions, $types = [])
 * @method $this select($fields = [], $overwrite = false)
 * @method \Cake\Datasource\RepositoryInterface getRepository()
 */
class ApiQuery implements QueryInterface
{
    public function aliasField($field, $alias = null)
    {
    }

    public function aliasFields($fields, $defaultAlias = null)
    {
    }

    public function all()
    {
    }

    public function applyOptions(array $options)
    {
    }

    public function find($finder, array $options = [])
    {
    }

    public function first()
    {
    }

    public function count()
    {
    }

    public function limit($num)
    {
    }

    public function offset($num)
    {
    }

    public function order($fields, $overwrite = false)
    {
    }

    public function page($num, $limit = null)
    {
    }

    public function toArray()
    {
    }

    public function repository(RepositoryInterface $repository = null)
    {
    }

    public function where($conditions = null, $types = [], $overwrite = false)
    {
    }

    public function __call($name, $arguments)
    {
    }
}
