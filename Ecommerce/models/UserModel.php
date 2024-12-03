<?php

require_once('BaseModel.php');


class UserModel extends BaseModel
{
    public static string $nome_tabella = 'User';
    protected array $_fields = [
        "id",
        "email",
        "password",
        "nome",
        "cognome",
        "venditore"
    ];

}