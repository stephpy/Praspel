<?php

/**
 * Hoa
 *
 *
 * @license
 *
 * New BSD License
 *
 * Copyright © 2007-2014, Ivan Enderlin. All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *     * Neither the name of the Hoa nor the names of its contributors may be
 *       used to endorse or promote products derived from this software without
 *       specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS AND CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

namespace {

from('Hoa')

/**
 * \Hoa\Praspel\Model\Clause
 */
-> import('Praspel.Model.Clause')

/**
 * \Hoa\Iterator\Aggregate
 */
-> import('Iterator.Aggregate')

/**
 * \Hoa\Iterator\Map
 */
-> import('Iterator.Map');

}

namespace Hoa\Praspel\Model {

/**
 * Class \Hoa\Praspel\Model\Description.
 *
 * Represent the @description clause.
 *
 * @author     Ivan Enderlin <ivan.enderlin@hoa-project.net>
 * @copyright  Copyright © 2007-2014 Ivan Enderlin.
 * @license    New BSD License
 */

class          Description
    extends    Clause
    implements \Hoa\Iterator\Aggregate,
               \ArrayAccess,
               \Countable {

    /**
     * Name.
     *
     * @const string
     */
    const NAME = 'description';

    /**
     * Examples.
     *
     * @var \Hoa\Praspel\Model\Description array
     */
    protected $_examples = array();



    /**
     * Check if an example exists.
     *
     * @access  public
     * @param   int  $offset    Offset.
     * @return  bool
     */
    public function offsetExists ( $offset ) {

        return isset($this->_examples[$offset]);
    }

    /**
     * Get an example.
     *
     * @access  public
     * @param   int  $offset    Offset.
     * @return  string
     */
    public function offsetGet ( $offset ) {

        if(false === $this->offsetExists($offset))
            return null;

        return $this->_examples[$offset];
    }

    /**
     * Set an example.
     *
     * @access  public
     * @param   int     $offset    Offset.
     * @param   string  $value     Example value.
     * @return  \Hoa\Praspel\Model\Description
     */
    public function offsetSet ( $offset, $value ) {

        if(null === $offset)
            $this->_examples[]        = $value;
        else
            $this->_examples[$offset] = $value;

        return $this;
    }

    /**
     * Unset an example.
     *
     * @access  public
     * @param   int  $offset    Offset.
     * @return  void
     */
    public function offsetUnset ( $offset ) {

        unset($this->_examples[$offset]);

        return;
    }

    /**
     * Iterator over examples.
     *
     * @access  public
     * @return  \Hoa\Iterator\Map
     */
    public function getIterator ( ) {

        return new \Hoa\Iterator\Map($this->_examples);
    }

    /**
     * Count number of examples.
     *
     * @access  public
     * @return  int
     */
    public function count ( ) {

        return count($this->_examples);
    }
}

}
