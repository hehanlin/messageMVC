<?php
/**
 * Created by PhpStorm.
 * User: hehanlin
 * Date: 2015/8/1
 * Time: 10:41
 */

//���幤�̸�Ŀ¼
define('BASEDIR',__DIR__);
//�����Զ��������ļ�
require_once BASEDIR.'/System/Loader.php';
//����spl���Զ����غ���
spl_autoload_register('\\System\\Loader::autoload');
//����application
System\Application::getInstance(BASEDIR)->dispatch();