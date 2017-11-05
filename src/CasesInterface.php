<?php namespace Chunker\NamesCases;


/**
 * Интерфейс склонений имени
 *
 * Interface CasesInterface
 * @package Chunker\NamesCases
 */
interface CasesInterface
{
	/**
	 * Именительный падеж
	 *
	 * @return string
	 */
	public function nominative():string;


	/**
	 * Родительный падеж
	 *
	 * @return string
	 */
	public function genitive():string;


	/**
	 * Дательный падеж
	 *
	 * @return string
	 */
	public function dative():string;


	/**
	 * Винительный падеж
	 *
	 * @return string
	 */
	public function accusative():string;


	/**
	 * Творительный падеж
	 *
	 * @return string
	 */
	public function ablative():string;


	/**
	 * Предложный падеж
	 *
	 * @return string
	 */
	public function prepositional():string;


	/**
	 * Род
	 *
	 * @return int
	 */
	public function gender():int;


	/**
	 * Мужской род?
	 *
	 * @return bool
	 */
	public function isMan():bool;


	/**
	 * Женский род?
	 *
	 * @return bool
	 */
	public function isWoman():bool;


	/**
	 * Преобразование в строку
	 *
	 * @return string
	 */
	public function __toString():string;
}