CREATE DATABASE Sindicato;

USE sindicato;

CREATE TABLE Usuario(
  login VARCHAR(50) PRIMARY KEY,
  senha VARCHAR(50) NOT NULL
);

CREATE TABLE Afiliado(
  matricula INT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  telefone INT NOT NULL,
  email VARCHAR(100) NOT NULL,
  nascimento DATETIME NOT NULL,
  endereco VARCHAR(150),
  rg INT NOT NULL,
  cpf INT NOT NULL,
  celular INT NOT NULL,
  sexo VARCHAR(10) NOT NULL,
  situacao VARCHAR(45) NOT NULL
);

CREATE TABLE Dependente(
  cpf INT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  telefone INT NOT NULL,
  email VARCHAR(100) NOT NULL,
  nascimento DATETIME NOT NULL,
  endereco VARCHAR(150) NOT NULL,
  rg INT NOT NULL,
  celular INT NOT NULL,
  sexo VARCHAR(10),
  Afiliado_matricula INT,
  FOREIGN KEY(Afiliado_matricula) REFERENCES Afiliado(matricula)
);

CREATE TABLE FolhaDePagamento(
  idPagamento INT PRIMARY KEY,
  salario DECIMAL(10,2) NOT NULL,
  periodo VARCHAR(45) NOT NULL,
  saldo DECIMAL(10,2) NOT NULL,
  data DATETIME NOT NULL,
  adicional DECIMAL(10,2),
  Afiliado_matricula INT,
  FOREIGN KEY(Afiliado_matricula) REFERENCES Afiliado(matricula)
);

CREATE TABLE Convenio(
  idConvenio INT PRIMARY KEY,
  cnpj INT NOT NULL,
  nome VARCHAR(150) NOT NULL,
  categoria VARCHAR(45) NOT NULL,
  empresa VARCHAR(45) NOT NULL,
  mensalidade VARCHAR(45) NOT NULL,
  DAS_Afiliado_matricula INT,
  RCS_Afiliado_matricula INT,
  FOREIGN KEY(DAS_Afiliado_matricula) REFERENCES DAS(Afiliado_matricula),
  FOREIGN KEY(RCS_Afiliado_matricula) REFERENCES RCS(Afiliado_matricula)
);

CREATE TABLE Afiliado_has_Convenio(
  Afiliado_matricula INT NOT NULL,
  Convenio_idConvenio INT NOT NULL,
  FOREIGN KEY(Afiliado_matricula) REFERENCES Afiliado(matricula),
  FOREIGN KEY(Convenio_idConvenio) REFERENCES Convenio(idConvenio)
);

CREATE TABLE Dependente_has_Convenio(
  Dependente_cpf INT NOT NULL,
  Convenio_idConvenio INT NOT NULL,
  FOREIGN KEY(Dependente_cpf) REFERENCES Dependente(cpf),
  FOREIGN KEY(Convenio_idConvenio) REFERENCES Convenio(idConvenio)
);

CREATE TABLE DAS(
  Afiliado_matricula INT,
  FOREIGN KEY(Afiliado_matricula) REFERENCES Afiliado(matricula),
  porcentagem DECIMAL(3,2) NOT NULL,
  saldo DECIMAL(10,2) NOT NULL
);

CREATE TABLE Devolucao_DAS(
  valor DECIMAL(10,2) NOT NULL,
  data DATETIME NOT NULL,
  DAS_Afiliado_matricula INT,
  FOREIGN KEY(DAS_Afiliado_matricula) REFERENCES DAS(Afiliado_matricula)
);

CREATE TABLE RCS(
  Afiliado_matricula INT,
  FOREIGN KEY(Afiliado_matricula) REFERENCES Afiliado(matricula),
  porcentagem DECIMAL(3,2),
  saldo DECIMAL(10,2)
);

CREATE TABLE Devolucao_RCS(
  valor DECIMAL(10,2) NOT NULL,
  data DATETIME NOT NULL,
  RCS_Afiliado_matricula INT,
  FOREIGN KEY(RCS_Afiliado_matricula) REFERENCES RCS(Afiliado_matricula)
);

