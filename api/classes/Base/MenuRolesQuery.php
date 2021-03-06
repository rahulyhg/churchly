<?php

namespace Base;

use \MenuRoles as ChildMenuRoles;
use \MenuRolesQuery as ChildMenuRolesQuery;
use \Exception;
use \PDO;
use Map\MenuRolesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'menu_roles' table.
 *
 * 
 *
 * @method     ChildMenuRolesQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method     ChildMenuRolesQuery orderByRoleId($order = Criteria::ASC) Order by the role_id column
 * @method     ChildMenuRolesQuery orderByMenuId($order = Criteria::ASC) Order by the menu_id column
 * @method     ChildMenuRolesQuery orderByAccess($order = Criteria::ASC) Order by the access column
 * @method     ChildMenuRolesQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     ChildMenuRolesQuery groupByValue() Group by the value column
 * @method     ChildMenuRolesQuery groupByRoleId() Group by the role_id column
 * @method     ChildMenuRolesQuery groupByMenuId() Group by the menu_id column
 * @method     ChildMenuRolesQuery groupByAccess() Group by the access column
 * @method     ChildMenuRolesQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     ChildMenuRolesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMenuRolesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMenuRolesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMenuRolesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMenuRolesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMenuRolesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMenuRolesQuery leftJoinMenu($relationAlias = null) Adds a LEFT JOIN clause to the query using the Menu relation
 * @method     ChildMenuRolesQuery rightJoinMenu($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Menu relation
 * @method     ChildMenuRolesQuery innerJoinMenu($relationAlias = null) Adds a INNER JOIN clause to the query using the Menu relation
 *
 * @method     ChildMenuRolesQuery joinWithMenu($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Menu relation
 *
 * @method     ChildMenuRolesQuery leftJoinWithMenu() Adds a LEFT JOIN clause and with to the query using the Menu relation
 * @method     ChildMenuRolesQuery rightJoinWithMenu() Adds a RIGHT JOIN clause and with to the query using the Menu relation
 * @method     ChildMenuRolesQuery innerJoinWithMenu() Adds a INNER JOIN clause and with to the query using the Menu relation
 *
 * @method     ChildMenuRolesQuery leftJoinRoles($relationAlias = null) Adds a LEFT JOIN clause to the query using the Roles relation
 * @method     ChildMenuRolesQuery rightJoinRoles($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Roles relation
 * @method     ChildMenuRolesQuery innerJoinRoles($relationAlias = null) Adds a INNER JOIN clause to the query using the Roles relation
 *
 * @method     ChildMenuRolesQuery joinWithRoles($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Roles relation
 *
 * @method     ChildMenuRolesQuery leftJoinWithRoles() Adds a LEFT JOIN clause and with to the query using the Roles relation
 * @method     ChildMenuRolesQuery rightJoinWithRoles() Adds a RIGHT JOIN clause and with to the query using the Roles relation
 * @method     ChildMenuRolesQuery innerJoinWithRoles() Adds a INNER JOIN clause and with to the query using the Roles relation
 *
 * @method     \MenuQuery|\RolesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildMenuRoles findOne(ConnectionInterface $con = null) Return the first ChildMenuRoles matching the query
 * @method     ChildMenuRoles findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMenuRoles matching the query, or a new ChildMenuRoles object populated from the query conditions when no match is found
 *
 * @method     ChildMenuRoles findOneByValue(int $value) Return the first ChildMenuRoles filtered by the value column
 * @method     ChildMenuRoles findOneByRoleId(int $role_id) Return the first ChildMenuRoles filtered by the role_id column
 * @method     ChildMenuRoles findOneByMenuId(int $menu_id) Return the first ChildMenuRoles filtered by the menu_id column
 * @method     ChildMenuRoles findOneByAccess(int $access) Return the first ChildMenuRoles filtered by the access column
 * @method     ChildMenuRoles findOneByCreatedAt(string $created_at) Return the first ChildMenuRoles filtered by the created_at column *

 * @method     ChildMenuRoles requirePk($key, ConnectionInterface $con = null) Return the ChildMenuRoles by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMenuRoles requireOne(ConnectionInterface $con = null) Return the first ChildMenuRoles matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMenuRoles requireOneByValue(int $value) Return the first ChildMenuRoles filtered by the value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMenuRoles requireOneByRoleId(int $role_id) Return the first ChildMenuRoles filtered by the role_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMenuRoles requireOneByMenuId(int $menu_id) Return the first ChildMenuRoles filtered by the menu_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMenuRoles requireOneByAccess(int $access) Return the first ChildMenuRoles filtered by the access column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMenuRoles requireOneByCreatedAt(string $created_at) Return the first ChildMenuRoles filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMenuRoles[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMenuRoles objects based on current ModelCriteria
 * @method     ChildMenuRoles[]|ObjectCollection findByValue(int $value) Return ChildMenuRoles objects filtered by the value column
 * @method     ChildMenuRoles[]|ObjectCollection findByRoleId(int $role_id) Return ChildMenuRoles objects filtered by the role_id column
 * @method     ChildMenuRoles[]|ObjectCollection findByMenuId(int $menu_id) Return ChildMenuRoles objects filtered by the menu_id column
 * @method     ChildMenuRoles[]|ObjectCollection findByAccess(int $access) Return ChildMenuRoles objects filtered by the access column
 * @method     ChildMenuRoles[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildMenuRoles objects filtered by the created_at column
 * @method     ChildMenuRoles[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MenuRolesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MenuRolesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\MenuRoles', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMenuRolesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMenuRolesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMenuRolesQuery) {
            return $criteria;
        }
        $query = new ChildMenuRolesQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildMenuRoles|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MenuRolesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MenuRolesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMenuRoles A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT value, role_id, menu_id, access, created_at FROM menu_roles WHERE value = :p0';
        try {
            $stmt = $con->prepare($sql);            
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildMenuRoles $obj */
            $obj = new ChildMenuRoles();
            $obj->hydrate($row);
            MenuRolesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildMenuRoles|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildMenuRolesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MenuRolesTableMap::COL_VALUE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMenuRolesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MenuRolesTableMap::COL_VALUE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue(1234); // WHERE value = 1234
     * $query->filterByValue(array(12, 34)); // WHERE value IN (12, 34)
     * $query->filterByValue(array('min' => 12)); // WHERE value > 12
     * </code>
     *
     * @param     mixed $value The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMenuRolesQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (is_array($value)) {
            $useMinMax = false;
            if (isset($value['min'])) {
                $this->addUsingAlias(MenuRolesTableMap::COL_VALUE, $value['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($value['max'])) {
                $this->addUsingAlias(MenuRolesTableMap::COL_VALUE, $value['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuRolesTableMap::COL_VALUE, $value, $comparison);
    }

    /**
     * Filter the query on the role_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRoleId(1234); // WHERE role_id = 1234
     * $query->filterByRoleId(array(12, 34)); // WHERE role_id IN (12, 34)
     * $query->filterByRoleId(array('min' => 12)); // WHERE role_id > 12
     * </code>
     *
     * @see       filterByRoles()
     *
     * @param     mixed $roleId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMenuRolesQuery The current query, for fluid interface
     */
    public function filterByRoleId($roleId = null, $comparison = null)
    {
        if (is_array($roleId)) {
            $useMinMax = false;
            if (isset($roleId['min'])) {
                $this->addUsingAlias(MenuRolesTableMap::COL_ROLE_ID, $roleId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($roleId['max'])) {
                $this->addUsingAlias(MenuRolesTableMap::COL_ROLE_ID, $roleId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuRolesTableMap::COL_ROLE_ID, $roleId, $comparison);
    }

    /**
     * Filter the query on the menu_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMenuId(1234); // WHERE menu_id = 1234
     * $query->filterByMenuId(array(12, 34)); // WHERE menu_id IN (12, 34)
     * $query->filterByMenuId(array('min' => 12)); // WHERE menu_id > 12
     * </code>
     *
     * @see       filterByMenu()
     *
     * @param     mixed $menuId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMenuRolesQuery The current query, for fluid interface
     */
    public function filterByMenuId($menuId = null, $comparison = null)
    {
        if (is_array($menuId)) {
            $useMinMax = false;
            if (isset($menuId['min'])) {
                $this->addUsingAlias(MenuRolesTableMap::COL_MENU_ID, $menuId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($menuId['max'])) {
                $this->addUsingAlias(MenuRolesTableMap::COL_MENU_ID, $menuId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuRolesTableMap::COL_MENU_ID, $menuId, $comparison);
    }

    /**
     * Filter the query on the access column
     *
     * Example usage:
     * <code>
     * $query->filterByAccess(1234); // WHERE access = 1234
     * $query->filterByAccess(array(12, 34)); // WHERE access IN (12, 34)
     * $query->filterByAccess(array('min' => 12)); // WHERE access > 12
     * </code>
     *
     * @param     mixed $access The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMenuRolesQuery The current query, for fluid interface
     */
    public function filterByAccess($access = null, $comparison = null)
    {
        if (is_array($access)) {
            $useMinMax = false;
            if (isset($access['min'])) {
                $this->addUsingAlias(MenuRolesTableMap::COL_ACCESS, $access['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($access['max'])) {
                $this->addUsingAlias(MenuRolesTableMap::COL_ACCESS, $access['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuRolesTableMap::COL_ACCESS, $access, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMenuRolesQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(MenuRolesTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(MenuRolesTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuRolesTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query by a related \Menu object
     *
     * @param \Menu|ObjectCollection $menu The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMenuRolesQuery The current query, for fluid interface
     */
    public function filterByMenu($menu, $comparison = null)
    {
        if ($menu instanceof \Menu) {
            return $this
                ->addUsingAlias(MenuRolesTableMap::COL_MENU_ID, $menu->getValue(), $comparison);
        } elseif ($menu instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MenuRolesTableMap::COL_MENU_ID, $menu->toKeyValue('PrimaryKey', 'Value'), $comparison);
        } else {
            throw new PropelException('filterByMenu() only accepts arguments of type \Menu or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Menu relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildMenuRolesQuery The current query, for fluid interface
     */
    public function joinMenu($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Menu');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Menu');
        }

        return $this;
    }

    /**
     * Use the Menu relation Menu object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MenuQuery A secondary query class using the current class as primary query
     */
    public function useMenuQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMenu($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Menu', '\MenuQuery');
    }

    /**
     * Filter the query by a related \Roles object
     *
     * @param \Roles|ObjectCollection $roles The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMenuRolesQuery The current query, for fluid interface
     */
    public function filterByRoles($roles, $comparison = null)
    {
        if ($roles instanceof \Roles) {
            return $this
                ->addUsingAlias(MenuRolesTableMap::COL_ROLE_ID, $roles->getValue(), $comparison);
        } elseif ($roles instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MenuRolesTableMap::COL_ROLE_ID, $roles->toKeyValue('PrimaryKey', 'Value'), $comparison);
        } else {
            throw new PropelException('filterByRoles() only accepts arguments of type \Roles or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Roles relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildMenuRolesQuery The current query, for fluid interface
     */
    public function joinRoles($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Roles');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Roles');
        }

        return $this;
    }

    /**
     * Use the Roles relation Roles object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \RolesQuery A secondary query class using the current class as primary query
     */
    public function useRolesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRoles($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Roles', '\RolesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMenuRoles $menuRoles Object to remove from the list of results
     *
     * @return $this|ChildMenuRolesQuery The current query, for fluid interface
     */
    public function prune($menuRoles = null)
    {
        if ($menuRoles) {
            $this->addUsingAlias(MenuRolesTableMap::COL_VALUE, $menuRoles->getValue(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the menu_roles table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MenuRolesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MenuRolesTableMap::clearInstancePool();
            MenuRolesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MenuRolesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MenuRolesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            MenuRolesTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            MenuRolesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MenuRolesQuery
