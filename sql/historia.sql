PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;

CREATE TABLE leitor
(cd_leitor INTEGER PRIMARY KEY NOT NULL,
nm_leitor TEXT NOT NULL,
ds_email TEXT NOT NULL,
ds_senha INTEGER NOT NULL);

CREATE TABLE historia
(cd_historia INTEGER PRIMARY KEY NOT NULL,
cd_leitor INTEGER NOT NULL,
nm_historia TEXT NOT NULL,
ds_genero TEXT NOT NULL,
ds_conteudo TEXT NOT NULL,
constraint leitor_historia_fk foreign key(cd_leitor)
references leitor (cd_leitor));

COMMIT;
