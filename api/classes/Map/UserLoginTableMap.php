<?php

namespace Map;

use \UserLogin;
use \UserLoginQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'user_login' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class UserLoginTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.UserLoginTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'user_login';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\UserLogin';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'UserLogin';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the value field
     */
    const COL_VALUE = 'user_login.value';

    /**
     * the column name for the envelope field
     */
    const COL_ENVELOPE = 'user_login.envelope';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'user_login.email';

    /**
     * the column name for the password field
     */
    const COL_PASSWORD = 'user_login.password';

    /**
     * the column name for the salt field
     */
    const COL_SALT = 'user_login.salt';

    /**
     * the column name for the parish_id field
     */
    const COL_PARISH_ID = 'user_login.parish_id';

    /**
     * the column name for the role_id field
     */
    const COL_ROLE_ID = 'user_login.role_id';

    /**
     * the column name for the last_login field
     */
    const COL_LAST_LOGIN = 'user_login.last_login';

    /**
     * the column name for the enabled field
     */
    const COL_ENABLED = 'user_login.enabled';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'user_login.created_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Value', 'Envelope', 'Email', 'Password', 'Salt', 'ParishId', 'RoleId', 'LastLogin', 'Enabled', 'CreatedAt', ),
        self::TYPE_CAMELNAME     => array('value', 'envelope', 'email', 'password', 'salt', 'parishId', 'roleId', 'lastLogin', 'enabled', 'createdAt', ),
        self::TYPE_COLNAME       => array(UserLoginTableMap::COL_VALUE, UserLoginTableMap::COL_ENVELOPE, UserLoginTableMap::COL_EMAIL, UserLoginTableMap::COL_PASSWORD, UserLoginTableMap::COL_SALT, UserLoginTableMap::COL_PARISH_ID, UserLoginTableMap::COL_ROLE_ID, UserLoginTableMap::COL_LAST_LOGIN, UserLoginTableMap::COL_ENABLED, UserLoginTableMap::COL_CREATED_AT, ),
        self::TYPE_FIELDNAME     => array('value', 'envelope', 'email', 'password', 'salt', 'parish_id', 'role_id', 'last_login', 'enabled', 'created_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Value' => 0, 'Envelope' => 1, 'Email' => 2, 'Password' => 3, 'Salt' => 4, 'ParishId' => 5, 'RoleId' => 6, 'LastLogin' => 7, 'Enabled' => 8, 'CreatedAt' => 9, ),
        self::TYPE_CAMELNAME     => array('value' => 0, 'envelope' => 1, 'email' => 2, 'password' => 3, 'salt' => 4, 'parishId' => 5, 'roleId' => 6, 'lastLogin' => 7, 'enabled' => 8, 'createdAt' => 9, ),
        self::TYPE_COLNAME       => array(UserLoginTableMap::COL_VALUE => 0, UserLoginTableMap::COL_ENVELOPE => 1, UserLoginTableMap::COL_EMAIL => 2, UserLoginTableMap::COL_PASSWORD => 3, UserLoginTableMap::COL_SALT => 4, UserLoginTableMap::COL_PARISH_ID => 5, UserLoginTableMap::COL_ROLE_ID => 6, UserLoginTableMap::COL_LAST_LOGIN => 7, UserLoginTableMap::COL_ENABLED => 8, UserLoginTableMap::COL_CREATED_AT => 9, ),
        self::TYPE_FIELDNAME     => array('value' => 0, 'envelope' => 1, 'email' => 2, 'password' => 3, 'salt' => 4, 'parish_id' => 5, 'role_id' => 6, 'last_login' => 7, 'enabled' => 8, 'created_at' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('user_login');
        $this->setPhpName('UserLogin');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\UserLogin');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('value', 'Value', 'INTEGER', true, null, null);
        $this->addColumn('envelope', 'Envelope', 'VARCHAR', false, 50, 'Guest');
        $this->addColumn('email', 'Email', 'VARCHAR', false, 50, null);
        $this->addColumn('password', 'Password', 'VARCHAR', false, 60, null);
        $this->addColumn('salt', 'Salt', 'VARCHAR', false, 20, null);
        $this->addForeignKey('parish_id', 'ParishId', 'INTEGER', 'parish', 'value', true, null, 0);
        $this->addForeignKey('role_id', 'RoleId', 'INTEGER', 'roles', 'value', true, null, 0);
        $this->addColumn('last_login', 'LastLogin', 'TIMESTAMP', false, null, null);
        $this->addColumn('enabled', 'Enabled', 'TINYINT', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Parish', '\\Parish', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':parish_id',
    1 => ':value',
  ),
), null, null, null, false);
        $this->addRelation('Roles', '\\Roles', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':role_id',
    1 => ':value',
  ),
), null, null, null, false);
        $this->addRelation('UserPayment', '\\UserPayment', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':user_id',
    1 => ':value',
  ),
), null, null, 'UserPayments', false);
        $this->addRelation('UserSubscription', '\\UserSubscription', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':user_id',
    1 => ':value',
  ),
), null, null, 'UserSubscriptions', false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Value', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Value', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Value', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Value', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Value', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Value', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Value', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }
    
    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? UserLoginTableMap::CLASS_DEFAULT : UserLoginTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (UserLogin object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = UserLoginTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = UserLoginTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + UserLoginTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UserLoginTableMap::OM_CLASS;
            /** @var UserLogin $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            UserLoginTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();
    
        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = UserLoginTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = UserLoginTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var UserLogin $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UserLoginTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(UserLoginTableMap::COL_VALUE);
            $criteria->addSelectColumn(UserLoginTableMap::COL_ENVELOPE);
            $criteria->addSelectColumn(UserLoginTableMap::COL_EMAIL);
            $criteria->addSelectColumn(UserLoginTableMap::COL_PASSWORD);
            $criteria->addSelectColumn(UserLoginTableMap::COL_SALT);
            $criteria->addSelectColumn(UserLoginTableMap::COL_PARISH_ID);
            $criteria->addSelectColumn(UserLoginTableMap::COL_ROLE_ID);
            $criteria->addSelectColumn(UserLoginTableMap::COL_LAST_LOGIN);
            $criteria->addSelectColumn(UserLoginTableMap::COL_ENABLED);
            $criteria->addSelectColumn(UserLoginTableMap::COL_CREATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.value');
            $criteria->addSelectColumn($alias . '.envelope');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.salt');
            $criteria->addSelectColumn($alias . '.parish_id');
            $criteria->addSelectColumn($alias . '.role_id');
            $criteria->addSelectColumn($alias . '.last_login');
            $criteria->addSelectColumn($alias . '.enabled');
            $criteria->addSelectColumn($alias . '.created_at');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(UserLoginTableMap::DATABASE_NAME)->getTable(UserLoginTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(UserLoginTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(UserLoginTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new UserLoginTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a UserLogin or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or UserLogin object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserLoginTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \UserLogin) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UserLoginTableMap::DATABASE_NAME);
            $criteria->add(UserLoginTableMap::COL_VALUE, (array) $values, Criteria::IN);
        }

        $query = UserLoginQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            UserLoginTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                UserLoginTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the user_login table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return UserLoginQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a UserLogin or Criteria object.
     *
     * @param mixed               $criteria Criteria or UserLogin object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserLoginTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from UserLogin object
        }

        if ($criteria->containsKey(UserLoginTableMap::COL_VALUE) && $criteria->keyContainsValue(UserLoginTableMap::COL_VALUE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.UserLoginTableMap::COL_VALUE.')');
        }


        // Set the correct dbName
        $query = UserLoginQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // UserLoginTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
UserLoginTableMap::buildTableMap();
