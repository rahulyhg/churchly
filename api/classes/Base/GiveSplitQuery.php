<?php

namespace Base;

use \GiveSplit as ChildGiveSplit;
use \GiveSplitQuery as ChildGiveSplitQuery;
use \Exception;
use \PDO;
use Map\GiveSplitTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'give_split' table.
 *
 * 
 *
 * @method     ChildGiveSplitQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method     ChildGiveSplitQuery orderByGiveId($order = Criteria::ASC) Order by the give_id column
 * @method     ChildGiveSplitQuery orderByItem($order = Criteria::ASC) Order by the item column
 * @method     ChildGiveSplitQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildGiveSplitQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     ChildGiveSplitQuery groupByValue() Group by the value column
 * @method     ChildGiveSplitQuery groupByGiveId() Group by the give_id column
 * @method     ChildGiveSplitQuery groupByItem() Group by the item column
 * @method     ChildGiveSplitQuery groupByAmount() Group by the amount column
 * @method     ChildGiveSplitQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     ChildGiveSplitQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildGiveSplitQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildGiveSplitQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildGiveSplitQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildGiveSplitQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildGiveSplitQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildGiveSplitQuery leftJoinGive($relationAlias = null) Adds a LEFT JOIN clause to the query using the Give relation
 * @method     ChildGiveSplitQuery rightJoinGive($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Give relation
 * @method     ChildGiveSplitQuery innerJoinGive($relationAlias = null) Adds a INNER JOIN clause to the query using the Give relation
 *
 * @method     ChildGiveSplitQuery joinWithGive($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Give relation
 *
 * @method     ChildGiveSplitQuery leftJoinWithGive() Adds a LEFT JOIN clause and with to the query using the Give relation
 * @method     ChildGiveSplitQuery rightJoinWithGive() Adds a RIGHT JOIN clause and with to the query using the Give relation
 * @method     ChildGiveSplitQuery innerJoinWithGive() Adds a INNER JOIN clause and with to the query using the Give relation
 *
 * @method     \GiveQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildGiveSplit findOne(ConnectionInterface $con = null) Return the first ChildGiveSplit matching the query
 * @method     ChildGiveSplit findOneOrCreate(ConnectionInterface $con = null) Return the first ChildGiveSplit matching the query, or a new ChildGiveSplit object populated from the query conditions when no match is found
 *
 * @method     ChildGiveSplit findOneByValue(int $value) Return the first ChildGiveSplit filtered by the value column
 * @method     ChildGiveSplit findOneByGiveId(int $give_id) Return the first ChildGiveSplit filtered by the give_id column
 * @method     ChildGiveSplit findOneByItem(string $item) Return the first ChildGiveSplit filtered by the item column
 * @method     ChildGiveSplit findOneByAmount(string $amount) Return the first ChildGiveSplit filtered by the amount column
 * @method     ChildGiveSplit findOneByCreatedAt(string $created_at) Return the first ChildGiveSplit filtered by the created_at column *

 * @method     ChildGiveSplit requirePk($key, ConnectionInterface $con = null) Return the ChildGiveSplit by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGiveSplit requireOne(ConnectionInterface $con = null) Return the first ChildGiveSplit matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGiveSplit requireOneByValue(int $value) Return the first ChildGiveSplit filtered by the value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGiveSplit requireOneByGiveId(int $give_id) Return the first ChildGiveSplit filtered by the give_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGiveSplit requireOneByItem(string $item) Return the first ChildGiveSplit filtered by the item column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGiveSplit requireOneByAmount(string $amount) Return the first ChildGiveSplit filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGiveSplit requireOneByCreatedAt(string $created_at) Return the first ChildGiveSplit filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGiveSplit[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildGiveSplit objects based on current ModelCriteria
 * @method     ChildGiveSplit[]|ObjectCollection findByValue(int $value) Return ChildGiveSplit objects filtered by the value column
 * @method     ChildGiveSplit[]|ObjectCollection findByGiveId(int $give_id) Return ChildGiveSplit objects filtered by the give_id column
 * @method     ChildGiveSplit[]|ObjectCollection findByItem(string $item) Return ChildGiveSplit objects filtered by the item column
 * @method     ChildGiveSplit[]|ObjectCollection findByAmount(string $amount) Return ChildGiveSplit objects filtered by the amount column
 * @method     ChildGiveSplit[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildGiveSplit objects filtered by the created_at column
 * @method     ChildGiveSplit[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class GiveSplitQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\GiveSplitQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\GiveSplit', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildGiveSplitQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildGiveSplitQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildGiveSplitQuery) {
            return $criteria;
        }
        $query = new ChildGiveSplitQuery();
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
     * @return ChildGiveSplit|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(GiveSplitTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = GiveSplitTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildGiveSplit A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT value, give_id, item, amount, created_at FROM give_split WHERE value = :p0';
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
            /** @var ChildGiveSplit $obj */
            $obj = new ChildGiveSplit();
            $obj->hydrate($row);
            GiveSplitTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildGiveSplit|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildGiveSplitQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(GiveSplitTableMap::COL_VALUE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildGiveSplitQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(GiveSplitTableMap::COL_VALUE, $keys, Criteria::IN);
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
     * @return $this|ChildGiveSplitQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (is_array($value)) {
            $useMinMax = false;
            if (isset($value['min'])) {
                $this->addUsingAlias(GiveSplitTableMap::COL_VALUE, $value['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($value['max'])) {
                $this->addUsingAlias(GiveSplitTableMap::COL_VALUE, $value['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GiveSplitTableMap::COL_VALUE, $value, $comparison);
    }

    /**
     * Filter the query on the give_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGiveId(1234); // WHERE give_id = 1234
     * $query->filterByGiveId(array(12, 34)); // WHERE give_id IN (12, 34)
     * $query->filterByGiveId(array('min' => 12)); // WHERE give_id > 12
     * </code>
     *
     * @see       filterByGive()
     *
     * @param     mixed $giveId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGiveSplitQuery The current query, for fluid interface
     */
    public function filterByGiveId($giveId = null, $comparison = null)
    {
        if (is_array($giveId)) {
            $useMinMax = false;
            if (isset($giveId['min'])) {
                $this->addUsingAlias(GiveSplitTableMap::COL_GIVE_ID, $giveId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($giveId['max'])) {
                $this->addUsingAlias(GiveSplitTableMap::COL_GIVE_ID, $giveId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GiveSplitTableMap::COL_GIVE_ID, $giveId, $comparison);
    }

    /**
     * Filter the query on the item column
     *
     * Example usage:
     * <code>
     * $query->filterByItem('fooValue');   // WHERE item = 'fooValue'
     * $query->filterByItem('%fooValue%'); // WHERE item LIKE '%fooValue%'
     * </code>
     *
     * @param     string $item The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGiveSplitQuery The current query, for fluid interface
     */
    public function filterByItem($item = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($item)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GiveSplitTableMap::COL_ITEM, $item, $comparison);
    }

    /**
     * Filter the query on the amount column
     *
     * Example usage:
     * <code>
     * $query->filterByAmount(1234); // WHERE amount = 1234
     * $query->filterByAmount(array(12, 34)); // WHERE amount IN (12, 34)
     * $query->filterByAmount(array('min' => 12)); // WHERE amount > 12
     * </code>
     *
     * @param     mixed $amount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGiveSplitQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(GiveSplitTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(GiveSplitTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GiveSplitTableMap::COL_AMOUNT, $amount, $comparison);
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
     * @return $this|ChildGiveSplitQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(GiveSplitTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(GiveSplitTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GiveSplitTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query by a related \Give object
     *
     * @param \Give|ObjectCollection $give The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildGiveSplitQuery The current query, for fluid interface
     */
    public function filterByGive($give, $comparison = null)
    {
        if ($give instanceof \Give) {
            return $this
                ->addUsingAlias(GiveSplitTableMap::COL_GIVE_ID, $give->getValue(), $comparison);
        } elseif ($give instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(GiveSplitTableMap::COL_GIVE_ID, $give->toKeyValue('PrimaryKey', 'Value'), $comparison);
        } else {
            throw new PropelException('filterByGive() only accepts arguments of type \Give or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Give relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildGiveSplitQuery The current query, for fluid interface
     */
    public function joinGive($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Give');

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
            $this->addJoinObject($join, 'Give');
        }

        return $this;
    }

    /**
     * Use the Give relation Give object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \GiveQuery A secondary query class using the current class as primary query
     */
    public function useGiveQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGive($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Give', '\GiveQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildGiveSplit $giveSplit Object to remove from the list of results
     *
     * @return $this|ChildGiveSplitQuery The current query, for fluid interface
     */
    public function prune($giveSplit = null)
    {
        if ($giveSplit) {
            $this->addUsingAlias(GiveSplitTableMap::COL_VALUE, $giveSplit->getValue(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the give_split table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GiveSplitTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            GiveSplitTableMap::clearInstancePool();
            GiveSplitTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(GiveSplitTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(GiveSplitTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            GiveSplitTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            GiveSplitTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // GiveSplitQuery
