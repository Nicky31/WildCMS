<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

		/* Expressions régulières */
		
		
function checkLogin($login)
{
	return preg_match('#^[a-zA-Z0-9-]{6,15}$#',$login);
}

function checkPass($pass)
{
	return preg_match('#^.{5,49}$#',$pass);
}

function checkMail($mail)
{
	return preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#',$mail);
}

function checkPseudo($pseudo)
{
	return preg_match('#^[a-zA-Z-]{3,15}$#',$pseudo);
}

function checkQuestion($question)
{
	return preg_match('#^.{3,35}$#',$question);
}

function checkResponse($response)
{
	return preg_match('#^.{3,20}$#',$response);
}
