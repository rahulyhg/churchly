<?php

namespace Map;

use \Events;
use \EventsQuery;
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
 * This class defines the structure of the 'events' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EventsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.EventsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'events';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Events';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Events';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the value field
     */
    const COL_VALUE = 'events.value';

    /**
     * the column name for the parish_id field
     */
    const COL_PARISH_ID = 'events.parish_id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'events.name';

    /**
     * the column name for the venue field
     */
    const COL_VENUE = 'events.venue';

    /**
     * the column name for the start_date field
     */
    const COL_START_DATE = 'events.start_date';

    /**
     * the column name for the start_time field
     */
    const COL_START_TIME = 'events.start_time';

    /**
     * the column name for the end_date field
     */
    const COL_END_DATE = 'events.end_date';

    /**
     * the column name for the end_time field
     */
    const COL_END_TIME = 'events.end_time';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'events.created_at';

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
        self::TYPE_PHPNAME       => array('Value', 'ParishId', 'Name', 'Venue', 'StartDate', 'StartTime', 'EndDate', 'EndTime', 'CreatedAt', ),
        self::TYPE_CAMELNAME     => array('value', 'parishId', 'name', 'venue', 'startDate', 'startTime', 'endDate', 'endTime', 'createdAt', ),
        self::TYPE_COLNAME       => array(EventsTableMap::COL_VALUE, EventsTableMap::COL_PARISH_ID, EventsTableMap::COL_NAME, EventsTableMap::COL_VENUE, EventsTableMap::COL_START_DATE, EventsTableMap::COL_START_TIME, EventsTableMap::COL_END_DATE, EventsTableMap::COL_END_TIME, EventsTableMap::COL_CREATED_AT, ),
        self::TYPE_FIELDNAME     => array('value', 'parish_id', 'name', 'venue', 'start_date', 'start_time', 'end_date', 'end_time', 'created_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Value' => 0, 'ParishId' => 1, 'Name' => 2, 'Venue' => 3, 'StartDate' => 4, 'StartTime' => 5, 'EndDate' => 6, 'EndTime' => 7, 'CreatedAt' => 8, ),
        self::TYPE_CAMELNAME     => array('value' => 0, 'parishId' => 1, 'name' => 2, 'venue' => 3, 'startDate' => 4, 'startTime' => 5, 'endDate' => 6, 'endTime' => 7, 'createdAt' => 8, ),
        self::TYPE_COLNAME       => array(EventsTableMap::COL_VALUE => 0, EventsTableMap::COL_PARISH_ID => 1, EventsTableMap::COL_NAME => 2, EventsTableMap::COL_VENUE => 3, EventsTableMap::COL_START_DATE => 4, EventsTableMap::COL_START_TIME => 5, EventsTableMap::COL_END_DATE => 6, EventsTableMap::COL_END_TIME => 7, EventsTableMap::COL_CREATED_AT => 8, ),
        self::TYPE_FIELDNAME     => array('value' => 0, 'parish_id' => 1, 'name' => 2, 'venue' => 3, 'start_date' => 4, 'start_time' => 5, 'end_date' => 6, 'end_time' => 7, 'created_at' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('events');
        $this->setPhpName('Events');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Events');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('value', 'Value', 'INTEGER', true, null, null);
        $this->addForeignKey('parish_id', 'ParishId', 'INTEGER', 'parish', 'value', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 200, null);
        $this->addColumn('venue', 'Venue', 'LONGVARCHAR', false, null, null);
        $this->addColumn('start_date', 'StartDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('start_time', 'StartTime', 'VARCHAR', false, 50, null);
        $this->addColumn('end_date', 'EndDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('end_time', 'EndTime', 'VARCHAR', false, 50, null);
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
        return $withPrefix ? EventsTableMap::CLASS_DEFAULT : EventsTableMap::OM_CLASS;
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
     * @return array           (Events object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EventsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EventsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EventsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EventsTableMap::OM_CLASS;
            /** @var Events $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EventsTableMap::addInstanceToPool($obj, $key);
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
            $key = EventsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EventsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Events $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EventsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EventsTableMap::COL_VALUE);
            $criteria->addSelectColumn(EventsTableMap::COL_PARISH_ID);
            $criteria->addSelectColumn(EventsTableMap::COL_NAME);
            $criteria->addSelectColumn(EventsTableMap::COL_VENUE);
            $criteria->addSelectColumn(EventsTableMap::COL_START_DATE);
            $criteria->addSelectColumn(EventsTableMap::COL_START_TIME);
            $criteria->addSelectColumn(EventsTableMap::COL_END_DATE);
            $criteria->addSelectColumn(EventsTableMap::COL_END_TIME);
            $criteria->addSelectColumn(EventsTableMap::COL_CREATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.value');
            $criteria->addSelectColumn($alias . '.parish_id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.venue');
            $criteria->addSelectColumn($alias . '.start_date');
            $criteria->addSelectColumn($alias . '.start_time');
            $criteria->addSelectColumn($alias . '.end_date');
            $criteria->addSelectColumn($alias . '.end_time');
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
        return Propel::getServiceContainer()->getDatabaseMap(EventsTableMap::DATABASE_NAME)->getTable(EventsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(EventsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(EventsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new EventsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Events or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Events object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EventsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Events) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EventsTableMap::DATABASE_NAME);
            $criteria->add(EventsTableMap::COL_VALUE, (array) $values, Criteria::IN);
        }

        $query = EventsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EventsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EventsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the events table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EventsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Events or Criteria object.
     *
     * @param mixed               $criteria Criteria or Events object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EventsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Events object
        }

        if ($criteria->containsKey(EventsTableMap::COL_VALUE) && $criteria->keyContainsValue(EventsTableMap::COL_VALUE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EventsTableMap::COL_VALUE.')');
        }


        // Set the correct dbName
        $query = EventsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EventsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EventsTableMap::buildTableMap();
