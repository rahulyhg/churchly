<?php

namespace Map;

use \Devotions;
use \DevotionsQuery;
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
 * This class defines the structure of the 'devotions' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class DevotionsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.DevotionsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'devotions';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Devotions';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Devotions';

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
    const COL_VALUE = 'devotions.value';

    /**
     * the column name for the parish_id field
     */
    const COL_PARISH_ID = 'devotions.parish_id';

    /**
     * the column name for the devotion_date field
     */
    const COL_DEVOTION_DATE = 'devotions.devotion_date';

    /**
     * the column name for the topic field
     */
    const COL_TOPIC = 'devotions.topic';

    /**
     * the column name for the verse field
     */
    const COL_VERSE = 'devotions.verse';

    /**
     * the column name for the content field
     */
    const COL_CONTENT = 'devotions.content';

    /**
     * the column name for the has_media field
     */
    const COL_HAS_MEDIA = 'devotions.has_media';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'devotions.type';

    /**
     * the column name for the url field
     */
    const COL_URL = 'devotions.url';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'devotions.created_at';

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
        self::TYPE_PHPNAME       => array('Value', 'ParishId', 'DevotionDate', 'Topic', 'Verse', 'Content', 'HasMedia', 'Type', 'Url', 'CreatedAt', ),
        self::TYPE_CAMELNAME     => array('value', 'parishId', 'devotionDate', 'topic', 'verse', 'content', 'hasMedia', 'type', 'url', 'createdAt', ),
        self::TYPE_COLNAME       => array(DevotionsTableMap::COL_VALUE, DevotionsTableMap::COL_PARISH_ID, DevotionsTableMap::COL_DEVOTION_DATE, DevotionsTableMap::COL_TOPIC, DevotionsTableMap::COL_VERSE, DevotionsTableMap::COL_CONTENT, DevotionsTableMap::COL_HAS_MEDIA, DevotionsTableMap::COL_TYPE, DevotionsTableMap::COL_URL, DevotionsTableMap::COL_CREATED_AT, ),
        self::TYPE_FIELDNAME     => array('value', 'parish_id', 'devotion_date', 'topic', 'verse', 'content', 'has_media', 'type', 'url', 'created_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Value' => 0, 'ParishId' => 1, 'DevotionDate' => 2, 'Topic' => 3, 'Verse' => 4, 'Content' => 5, 'HasMedia' => 6, 'Type' => 7, 'Url' => 8, 'CreatedAt' => 9, ),
        self::TYPE_CAMELNAME     => array('value' => 0, 'parishId' => 1, 'devotionDate' => 2, 'topic' => 3, 'verse' => 4, 'content' => 5, 'hasMedia' => 6, 'type' => 7, 'url' => 8, 'createdAt' => 9, ),
        self::TYPE_COLNAME       => array(DevotionsTableMap::COL_VALUE => 0, DevotionsTableMap::COL_PARISH_ID => 1, DevotionsTableMap::COL_DEVOTION_DATE => 2, DevotionsTableMap::COL_TOPIC => 3, DevotionsTableMap::COL_VERSE => 4, DevotionsTableMap::COL_CONTENT => 5, DevotionsTableMap::COL_HAS_MEDIA => 6, DevotionsTableMap::COL_TYPE => 7, DevotionsTableMap::COL_URL => 8, DevotionsTableMap::COL_CREATED_AT => 9, ),
        self::TYPE_FIELDNAME     => array('value' => 0, 'parish_id' => 1, 'devotion_date' => 2, 'topic' => 3, 'verse' => 4, 'content' => 5, 'has_media' => 6, 'type' => 7, 'url' => 8, 'created_at' => 9, ),
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
        $this->setName('devotions');
        $this->setPhpName('Devotions');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Devotions');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('value', 'Value', 'INTEGER', true, null, null);
        $this->addForeignKey('parish_id', 'ParishId', 'INTEGER', 'parish', 'value', true, null, null);
        $this->addColumn('devotion_date', 'DevotionDate', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('topic', 'Topic', 'VARCHAR', false, 250, null);
        $this->addColumn('verse', 'Verse', 'VARCHAR', false, 250, null);
        $this->addColumn('content', 'Content', 'LONGVARCHAR', true, null, null);
        $this->addColumn('has_media', 'HasMedia', 'BOOLEAN', true, 1, null);
        $this->addForeignKey('type', 'Type', 'INTEGER', 'media_type', 'value', true, null, null);
        $this->addColumn('url', 'Url', 'VARCHAR', false, 200, null);
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
        $this->addRelation('MediaType', '\\MediaType', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':type',
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
        return $withPrefix ? DevotionsTableMap::CLASS_DEFAULT : DevotionsTableMap::OM_CLASS;
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
     * @return array           (Devotions object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = DevotionsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = DevotionsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + DevotionsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DevotionsTableMap::OM_CLASS;
            /** @var Devotions $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            DevotionsTableMap::addInstanceToPool($obj, $key);
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
            $key = DevotionsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = DevotionsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Devotions $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DevotionsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(DevotionsTableMap::COL_VALUE);
            $criteria->addSelectColumn(DevotionsTableMap::COL_PARISH_ID);
            $criteria->addSelectColumn(DevotionsTableMap::COL_DEVOTION_DATE);
            $criteria->addSelectColumn(DevotionsTableMap::COL_TOPIC);
            $criteria->addSelectColumn(DevotionsTableMap::COL_VERSE);
            $criteria->addSelectColumn(DevotionsTableMap::COL_CONTENT);
            $criteria->addSelectColumn(DevotionsTableMap::COL_HAS_MEDIA);
            $criteria->addSelectColumn(DevotionsTableMap::COL_TYPE);
            $criteria->addSelectColumn(DevotionsTableMap::COL_URL);
            $criteria->addSelectColumn(DevotionsTableMap::COL_CREATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.value');
            $criteria->addSelectColumn($alias . '.parish_id');
            $criteria->addSelectColumn($alias . '.devotion_date');
            $criteria->addSelectColumn($alias . '.topic');
            $criteria->addSelectColumn($alias . '.verse');
            $criteria->addSelectColumn($alias . '.content');
            $criteria->addSelectColumn($alias . '.has_media');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.url');
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
        return Propel::getServiceContainer()->getDatabaseMap(DevotionsTableMap::DATABASE_NAME)->getTable(DevotionsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(DevotionsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(DevotionsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new DevotionsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Devotions or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Devotions object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(DevotionsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Devotions) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DevotionsTableMap::DATABASE_NAME);
            $criteria->add(DevotionsTableMap::COL_VALUE, (array) $values, Criteria::IN);
        }

        $query = DevotionsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            DevotionsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                DevotionsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the devotions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return DevotionsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Devotions or Criteria object.
     *
     * @param mixed               $criteria Criteria or Devotions object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DevotionsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Devotions object
        }

        if ($criteria->containsKey(DevotionsTableMap::COL_VALUE) && $criteria->keyContainsValue(DevotionsTableMap::COL_VALUE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.DevotionsTableMap::COL_VALUE.')');
        }


        // Set the correct dbName
        $query = DevotionsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // DevotionsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
DevotionsTableMap::buildTableMap();
