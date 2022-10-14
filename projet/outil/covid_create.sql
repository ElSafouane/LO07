-- =================================================================
-- Base COVID 
-- Marc LEMERCIER, le 10 mai 2021
-- =================================================================


-- table vaccin permet de lister la liste des vaccins homologuée par l'Union Européenne
-- doses définit le nombre de doses nécessaires pour ce vaccin.

create table if not exists vaccin (
  id integer unsigned not null, 
  label varchar(40) unique not null,
  doses integer unsigned not null,
  primary key (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;


-- table centre permet de mmoriser les centres de vaccination existants

create table if not exists centre (
  id integer unsigned not null,
  label varchar(40) not null,
  adresse varchar(80) not null,
  primary key (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;


-- table stock permet de mémoriser la quantité de chaque vaccin disponible pour les centres

create table if not exists stock (
 centre_id integer unsigned not null,
 vaccin_id integer unsigned not null,
 quantite integer unsigned not null,
 primary key (centre_id, vaccin_id), 
 foreign key (centre_id) references centre(id),
 foreign key (vaccin_id) references vaccin(id)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

-- table patient permet de mémoriser la liste des patients inscrits pour la vaccination

create table if not exists patient (
 id integer unsigned not null,
 nom varchar(40) not null,
 prenom varchar(40) not null,
 adresse varchar(80) not null,
 primary key (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;


-- table rendezvous permet de mémoriser le patient, la séquence des vaccinations avec l'attribut injection (1, 2, 3, ..) 
-- les dentifiants du vaccin et du centre.

create table if not exists rendezvous (
 centre_id integer unsigned not null,
 patient_id integer unsigned not null, 
 injection integer unsigned not null,
 vaccin_id integer unsigned not null,
 primary key (centre_id, patient_id, injection), 
 foreign key (centre_id) references centre(id),
 foreign key (patient_id) references patient(id), 
 foreign key (vaccin_id) references vaccin(id)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;
