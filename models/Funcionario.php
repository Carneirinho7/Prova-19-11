<?php
abstract class Funcionario {
    protected string $nome;
    protected string $email;
    protected float $salario;

    public function __construct(string $nome, string $email, float $salario) {
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setSalario($salario);
    }
    