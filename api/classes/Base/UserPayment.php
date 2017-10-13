<?php

namespace Base;

use \UserLogin as ChildUserLogin;
use \UserLoginQuery as ChildUserLoginQuery;
use \UserPayment as ChildUserPayment;
use \UserPaymentQuery as ChildUserPaymentQuery;
use \UserSubscription as ChildUserSubscription;
use \UserSubscriptionQuery as ChildUserSubscriptionQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\UserPaymentTableMap;
use Map\UserSubscriptionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'user_payment' table.
 *
 * 
 *
 * @package    propel.generator..Base
 */
abstract class UserPayment implements ActiveRecordInterface 
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\UserPaymentTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the value field.
     * 
     * @var        int
     */
    protected $value;

    /**
     * The value for the description field.
     * 
     * @var        string
     */
    protected $description;

    /**
     * The value for the user_id field.
     * 
     * @var        int
     */
    protected $user_id;

    /**
     * The value for the status field.
     * 
     * @var        string
     */
    protected $status;

    /**
     * The value for the reference field.
     * 
     * @var        string
     */
    protected $reference;

    /**
     * The value for the log field.
     * 
     * @var        string
     */
    protected $log;

    /**
     * The value for the created_at field.
     * 
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $created_at;

    /**
     * @var        ChildUserLogin
     */
    protected $aUserLogin;

    /**
     * @var        ObjectCollection|ChildUserSubscription[] Collection to store aggregation of ChildUserSubscription objects.
     */
    protected $collUserSubscriptions;
    protected $collUserSubscriptionsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildUserSubscription[]
     */
    protected $userSubscriptionsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
    }

    /**
     * Initializes internal state of Base\UserPayment object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>UserPayment</code> instance.  If
     * <code>obj</code> is an instance of <code>UserPayment</code>, delegates to
     * <code>equals(UserPayment)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|UserPayment The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));
        
        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }
        
        return $propertyNames;
    }

    /**
     * Get the [value] column value.
     * 
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get the [description] column value.
     * 
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the [user_id] column value.
     * 
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Get the [status] column value.
     * 
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [reference] column value.
     * 
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Get the [log] column value.
     * 
     * @return string
     */
    public function getLog()
    {
        return $this->log;
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = NULL)
    {
        if ($format === null) {
            return $this->created_at;
        } else {
            return $this->created_at instanceof \DateTimeInterface ? $this->created_at->format($format) : null;
        }
    }

    /**
     * Set the value of [value] column.
     * 
     * @param int $v new value
     * @return $this|\UserPayment The current object (for fluent API support)
     */
    public function setValue($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->value !== $v) {
            $this->value = $v;
            $this->modifiedColumns[UserPaymentTableMap::COL_VALUE] = true;
        }

        return $this;
    } // setValue()

    /**
     * Set the value of [description] column.
     * 
     * @param string $v new value
     * @return $this|\UserPayment The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[UserPaymentTableMap::COL_DESCRIPTION] = true;
        }

        return $this;
    } // setDescription()

    /**
     * Set the value of [user_id] column.
     * 
     * @param int $v new value
     * @return $this|\UserPayment The current object (for fluent API support)
     */
    public function setUserId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->user_id !== $v) {
            $this->user_id = $v;
            $this->modifiedColumns[UserPaymentTableMap::COL_USER_ID] = true;
        }

        if ($this->aUserLogin !== null && $this->aUserLogin->getValue() !== $v) {
            $this->aUserLogin = null;
        }

        return $this;
    } // setUserId()

    /**
     * Set the value of [status] column.
     * 
     * @param string $v new value
     * @return $this|\UserPayment The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[UserPaymentTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [reference] column.
     * 
     * @param string $v new value
     * @return $this|\UserPayment The current object (for fluent API support)
     */
    public function setReference($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->reference !== $v) {
            $this->reference = $v;
            $this->modifiedColumns[UserPaymentTableMap::COL_REFERENCE] = true;
        }

        return $this;
    } // setReference()

    /**
     * Set the value of [log] column.
     * 
     * @param string $v new value
     * @return $this|\UserPayment The current object (for fluent API support)
     */
    public function setLog($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->log !== $v) {
            $this->log = $v;
            $this->modifiedColumns[UserPaymentTableMap::COL_LOG] = true;
        }

        return $this;
    } // setLog()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     * 
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\UserPayment The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->created_at->format("Y-m-d H:i:s.u")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[UserPaymentTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : UserPaymentTableMap::translateFieldName('Value', TableMap::TYPE_PHPNAME, $indexType)];
            $this->value = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : UserPaymentTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
            $this->description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : UserPaymentTableMap::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : UserPaymentTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : UserPaymentTableMap::translateFieldName('Reference', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reference = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : UserPaymentTableMap::translateFieldName('Log', TableMap::TYPE_PHPNAME, $indexType)];
            $this->log = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : UserPaymentTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 7; // 7 = UserPaymentTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\UserPayment'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aUserLogin !== null && $this->user_id !== $this->aUserLogin->getValue()) {
            $this->aUserLogin = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UserPaymentTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildUserPaymentQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aUserLogin = null;
            $this->collUserSubscriptions = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see UserPayment::setDeleted()
     * @see UserPayment::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserPaymentTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildUserPaymentQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserPaymentTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                UserPaymentTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aUserLogin !== null) {
                if ($this->aUserLogin->isModified() || $this->aUserLogin->isNew()) {
                    $affectedRows += $this->aUserLogin->save($con);
                }
                $this->setUserLogin($this->aUserLogin);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->userSubscriptionsScheduledForDeletion !== null) {
                if (!$this->userSubscriptionsScheduledForDeletion->isEmpty()) {
                    foreach ($this->userSubscriptionsScheduledForDeletion as $userSubscription) {
                        // need to save related object because we set the relation to null
                        $userSubscription->save($con);
                    }
                    $this->userSubscriptionsScheduledForDeletion = null;
                }
            }

            if ($this->collUserSubscriptions !== null) {
                foreach ($this->collUserSubscriptions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[UserPaymentTableMap::COL_VALUE] = true;
        if (null !== $this->value) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . UserPaymentTableMap::COL_VALUE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(UserPaymentTableMap::COL_VALUE)) {
            $modifiedColumns[':p' . $index++]  = 'value';
        }
        if ($this->isColumnModified(UserPaymentTableMap::COL_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'description';
        }
        if ($this->isColumnModified(UserPaymentTableMap::COL_USER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'user_id';
        }
        if ($this->isColumnModified(UserPaymentTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(UserPaymentTableMap::COL_REFERENCE)) {
            $modifiedColumns[':p' . $index++]  = 'reference';
        }
        if ($this->isColumnModified(UserPaymentTableMap::COL_LOG)) {
            $modifiedColumns[':p' . $index++]  = 'log';
        }
        if ($this->isColumnModified(UserPaymentTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }

        $sql = sprintf(
            'INSERT INTO user_payment (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'value':                        
                        $stmt->bindValue($identifier, $this->value, PDO::PARAM_INT);
                        break;
                    case 'description':                        
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case 'user_id':                        
                        $stmt->bindValue($identifier, $this->user_id, PDO::PARAM_INT);
                        break;
                    case 'status':                        
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);
                        break;
                    case 'reference':                        
                        $stmt->bindValue($identifier, $this->reference, PDO::PARAM_STR);
                        break;
                    case 'log':                        
                        $stmt->bindValue($identifier, $this->log, PDO::PARAM_STR);
                        break;
                    case 'created_at':                        
                        $stmt->bindValue($identifier, $this->created_at ? $this->created_at->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setValue($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = UserPaymentTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getValue();
                break;
            case 1:
                return $this->getDescription();
                break;
            case 2:
                return $this->getUserId();
                break;
            case 3:
                return $this->getStatus();
                break;
            case 4:
                return $this->getReference();
                break;
            case 5:
                return $this->getLog();
                break;
            case 6:
                return $this->getCreatedAt();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['UserPayment'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['UserPayment'][$this->hashCode()] = true;
        $keys = UserPaymentTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getValue(),
            $keys[1] => $this->getDescription(),
            $keys[2] => $this->getUserId(),
            $keys[3] => $this->getStatus(),
            $keys[4] => $this->getReference(),
            $keys[5] => $this->getLog(),
            $keys[6] => $this->getCreatedAt(),
        );
        if ($result[$keys[6]] instanceof \DateTime) {
            $result[$keys[6]] = $result[$keys[6]]->format('c');
        }
        
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }
        
        if ($includeForeignObjects) {
            if (null !== $this->aUserLogin) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'userLogin';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'user_login';
                        break;
                    default:
                        $key = 'UserLogin';
                }
        
                $result[$key] = $this->aUserLogin->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collUserSubscriptions) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'userSubscriptions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'user_subscriptions';
                        break;
                    default:
                        $key = 'UserSubscriptions';
                }
        
                $result[$key] = $this->collUserSubscriptions->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\UserPayment
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = UserPaymentTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\UserPayment
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setValue($value);
                break;
            case 1:
                $this->setDescription($value);
                break;
            case 2:
                $this->setUserId($value);
                break;
            case 3:
                $this->setStatus($value);
                break;
            case 4:
                $this->setReference($value);
                break;
            case 5:
                $this->setLog($value);
                break;
            case 6:
                $this->setCreatedAt($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = UserPaymentTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setValue($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setDescription($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setUserId($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setStatus($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setReference($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setLog($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setCreatedAt($arr[$keys[6]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\UserPayment The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(UserPaymentTableMap::DATABASE_NAME);

        if ($this->isColumnModified(UserPaymentTableMap::COL_VALUE)) {
            $criteria->add(UserPaymentTableMap::COL_VALUE, $this->value);
        }
        if ($this->isColumnModified(UserPaymentTableMap::COL_DESCRIPTION)) {
            $criteria->add(UserPaymentTableMap::COL_DESCRIPTION, $this->description);
        }
        if ($this->isColumnModified(UserPaymentTableMap::COL_USER_ID)) {
            $criteria->add(UserPaymentTableMap::COL_USER_ID, $this->user_id);
        }
        if ($this->isColumnModified(UserPaymentTableMap::COL_STATUS)) {
            $criteria->add(UserPaymentTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(UserPaymentTableMap::COL_REFERENCE)) {
            $criteria->add(UserPaymentTableMap::COL_REFERENCE, $this->reference);
        }
        if ($this->isColumnModified(UserPaymentTableMap::COL_LOG)) {
            $criteria->add(UserPaymentTableMap::COL_LOG, $this->log);
        }
        if ($this->isColumnModified(UserPaymentTableMap::COL_CREATED_AT)) {
            $criteria->add(UserPaymentTableMap::COL_CREATED_AT, $this->created_at);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildUserPaymentQuery::create();
        $criteria->add(UserPaymentTableMap::COL_VALUE, $this->value);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getValue();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }
        
    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getValue();
    }

    /**
     * Generic method to set the primary key (value column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setValue($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getValue();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \UserPayment (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDescription($this->getDescription());
        $copyObj->setUserId($this->getUserId());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setReference($this->getReference());
        $copyObj->setLog($this->getLog());
        $copyObj->setCreatedAt($this->getCreatedAt());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getUserSubscriptions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUserSubscription($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setValue(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \UserPayment Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildUserLogin object.
     *
     * @param  ChildUserLogin $v
     * @return $this|\UserPayment The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUserLogin(ChildUserLogin $v = null)
    {
        if ($v === null) {
            $this->setUserId(NULL);
        } else {
            $this->setUserId($v->getValue());
        }

        $this->aUserLogin = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildUserLogin object, it will not be re-added.
        if ($v !== null) {
            $v->addUserPayment($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildUserLogin object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildUserLogin The associated ChildUserLogin object.
     * @throws PropelException
     */
    public function getUserLogin(ConnectionInterface $con = null)
    {
        if ($this->aUserLogin === null && ($this->user_id !== null)) {
            $this->aUserLogin = ChildUserLoginQuery::create()->findPk($this->user_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUserLogin->addUserPayments($this);
             */
        }

        return $this->aUserLogin;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('UserSubscription' == $relationName) {
            return $this->initUserSubscriptions();
        }
    }

    /**
     * Clears out the collUserSubscriptions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addUserSubscriptions()
     */
    public function clearUserSubscriptions()
    {
        $this->collUserSubscriptions = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collUserSubscriptions collection loaded partially.
     */
    public function resetPartialUserSubscriptions($v = true)
    {
        $this->collUserSubscriptionsPartial = $v;
    }

    /**
     * Initializes the collUserSubscriptions collection.
     *
     * By default this just sets the collUserSubscriptions collection to an empty array (like clearcollUserSubscriptions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUserSubscriptions($overrideExisting = true)
    {
        if (null !== $this->collUserSubscriptions && !$overrideExisting) {
            return;
        }

        $collectionClassName = UserSubscriptionTableMap::getTableMap()->getCollectionClassName();

        $this->collUserSubscriptions = new $collectionClassName;
        $this->collUserSubscriptions->setModel('\UserSubscription');
    }

    /**
     * Gets an array of ChildUserSubscription objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUserPayment is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildUserSubscription[] List of ChildUserSubscription objects
     * @throws PropelException
     */
    public function getUserSubscriptions(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collUserSubscriptionsPartial && !$this->isNew();
        if (null === $this->collUserSubscriptions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUserSubscriptions) {
                // return empty collection
                $this->initUserSubscriptions();
            } else {
                $collUserSubscriptions = ChildUserSubscriptionQuery::create(null, $criteria)
                    ->filterByUserPayment($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collUserSubscriptionsPartial && count($collUserSubscriptions)) {
                        $this->initUserSubscriptions(false);

                        foreach ($collUserSubscriptions as $obj) {
                            if (false == $this->collUserSubscriptions->contains($obj)) {
                                $this->collUserSubscriptions->append($obj);
                            }
                        }

                        $this->collUserSubscriptionsPartial = true;
                    }

                    return $collUserSubscriptions;
                }

                if ($partial && $this->collUserSubscriptions) {
                    foreach ($this->collUserSubscriptions as $obj) {
                        if ($obj->isNew()) {
                            $collUserSubscriptions[] = $obj;
                        }
                    }
                }

                $this->collUserSubscriptions = $collUserSubscriptions;
                $this->collUserSubscriptionsPartial = false;
            }
        }

        return $this->collUserSubscriptions;
    }

    /**
     * Sets a collection of ChildUserSubscription objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $userSubscriptions A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUserPayment The current object (for fluent API support)
     */
    public function setUserSubscriptions(Collection $userSubscriptions, ConnectionInterface $con = null)
    {
        /** @var ChildUserSubscription[] $userSubscriptionsToDelete */
        $userSubscriptionsToDelete = $this->getUserSubscriptions(new Criteria(), $con)->diff($userSubscriptions);

        
        $this->userSubscriptionsScheduledForDeletion = $userSubscriptionsToDelete;

        foreach ($userSubscriptionsToDelete as $userSubscriptionRemoved) {
            $userSubscriptionRemoved->setUserPayment(null);
        }

        $this->collUserSubscriptions = null;
        foreach ($userSubscriptions as $userSubscription) {
            $this->addUserSubscription($userSubscription);
        }

        $this->collUserSubscriptions = $userSubscriptions;
        $this->collUserSubscriptionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related UserSubscription objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related UserSubscription objects.
     * @throws PropelException
     */
    public function countUserSubscriptions(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collUserSubscriptionsPartial && !$this->isNew();
        if (null === $this->collUserSubscriptions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUserSubscriptions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getUserSubscriptions());
            }

            $query = ChildUserSubscriptionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUserPayment($this)
                ->count($con);
        }

        return count($this->collUserSubscriptions);
    }

    /**
     * Method called to associate a ChildUserSubscription object to this object
     * through the ChildUserSubscription foreign key attribute.
     *
     * @param  ChildUserSubscription $l ChildUserSubscription
     * @return $this|\UserPayment The current object (for fluent API support)
     */
    public function addUserSubscription(ChildUserSubscription $l)
    {
        if ($this->collUserSubscriptions === null) {
            $this->initUserSubscriptions();
            $this->collUserSubscriptionsPartial = true;
        }

        if (!$this->collUserSubscriptions->contains($l)) {
            $this->doAddUserSubscription($l);

            if ($this->userSubscriptionsScheduledForDeletion and $this->userSubscriptionsScheduledForDeletion->contains($l)) {
                $this->userSubscriptionsScheduledForDeletion->remove($this->userSubscriptionsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildUserSubscription $userSubscription The ChildUserSubscription object to add.
     */
    protected function doAddUserSubscription(ChildUserSubscription $userSubscription)
    {
        $this->collUserSubscriptions[]= $userSubscription;
        $userSubscription->setUserPayment($this);
    }

    /**
     * @param  ChildUserSubscription $userSubscription The ChildUserSubscription object to remove.
     * @return $this|ChildUserPayment The current object (for fluent API support)
     */
    public function removeUserSubscription(ChildUserSubscription $userSubscription)
    {
        if ($this->getUserSubscriptions()->contains($userSubscription)) {
            $pos = $this->collUserSubscriptions->search($userSubscription);
            $this->collUserSubscriptions->remove($pos);
            if (null === $this->userSubscriptionsScheduledForDeletion) {
                $this->userSubscriptionsScheduledForDeletion = clone $this->collUserSubscriptions;
                $this->userSubscriptionsScheduledForDeletion->clear();
            }
            $this->userSubscriptionsScheduledForDeletion[]= $userSubscription;
            $userSubscription->setUserPayment(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this UserPayment is new, it will return
     * an empty collection; or if this UserPayment has previously
     * been saved, it will retrieve related UserSubscriptions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in UserPayment.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildUserSubscription[] List of ChildUserSubscription objects
     */
    public function getUserSubscriptionsJoinUserLogin(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildUserSubscriptionQuery::create(null, $criteria);
        $query->joinWith('UserLogin', $joinBehavior);

        return $this->getUserSubscriptions($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this UserPayment is new, it will return
     * an empty collection; or if this UserPayment has previously
     * been saved, it will retrieve related UserSubscriptions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in UserPayment.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildUserSubscription[] List of ChildUserSubscription objects
     */
    public function getUserSubscriptionsJoinUserPlan(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildUserSubscriptionQuery::create(null, $criteria);
        $query->joinWith('UserPlan', $joinBehavior);

        return $this->getUserSubscriptions($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this UserPayment is new, it will return
     * an empty collection; or if this UserPayment has previously
     * been saved, it will retrieve related UserSubscriptions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in UserPayment.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildUserSubscription[] List of ChildUserSubscription objects
     */
    public function getUserSubscriptionsJoinParish(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildUserSubscriptionQuery::create(null, $criteria);
        $query->joinWith('Parish', $joinBehavior);

        return $this->getUserSubscriptions($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aUserLogin) {
            $this->aUserLogin->removeUserPayment($this);
        }
        $this->value = null;
        $this->description = null;
        $this->user_id = null;
        $this->status = null;
        $this->reference = null;
        $this->log = null;
        $this->created_at = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collUserSubscriptions) {
                foreach ($this->collUserSubscriptions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collUserSubscriptions = null;
        $this->aUserLogin = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(UserPaymentTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}