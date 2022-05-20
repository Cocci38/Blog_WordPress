CREATE TABLE input(
   id_input INT,
   type VARCHAR(255)  NOT NULL,
   PRIMARY KEY(id_input)
);

CREATE TABLE champ(
   id_champ INT,
   name_champ VARCHAR(255) ,
   input_id INT,
   id_input INT NOT NULL,
   PRIMARY KEY(id_champ),
   FOREIGN KEY(id_input) REFERENCES input(id_input)
);

CREATE TABLE liaison(
   id_liaison INT,
   input_id INT,
   champ_id INT,
   formulaire_id INT,
   id_champ INT,
   PRIMARY KEY(id_liaison),
   FOREIGN KEY(id_champ) REFERENCES champ(id_champ)
);

CREATE TABLE formulaire(
   id_formulaire INT,
   category_id INT,
   id_liaison INT NOT NULL,
   PRIMARY KEY(id_formulaire),
   FOREIGN KEY(id_liaison) REFERENCES liaison(id_liaison)
);
