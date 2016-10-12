CREATE TABLE users (
  uid INTEGER PRIMARY KEY,
  email TEXT NOT NULL UNIQUE,
  pass TEXT NOT NULL,
  username TEXT NOT NULL UNIQUE,
  name TEXT NOT NULL
);

CREATE TABLE events (
  eid INTEGER PRIMARY KEY,
  owner INTEGER REFERENCES users(uid),
  title TEXT NOT NULL,
  type TEXT NOT NULL,
  description TEXT NOT NULL,
  s_date TEXT NOT NULL,
  e_date TEXT NOT NULL,
  s_time TEXT NOT NULL,
  e_time TEXT NOT NULL,
  state TEXT NOT NULL,
  location TEXT NOT NULL
);

CREATE TABLE joins (
  user INTEGER NOT NULL REFERENCES users(uid),
  event INTEGER NOT NULL REFERENCES events(eid) ON DELETE CASCADE,
  PRIMARY KEY(user, event)
);

CREATE TABLE invites (
  user INTEGER NOT NULL REFERENCES users(uid),
  event INTEGER NOT NULL REFERENCES events(eid) ON DELETE CASCADE,
  answered INTEGER NOT NULL,
  PRIMARY KEY(user, event)
);

CREATE TABLE comments (
  cid INTEGER PRIMARY KEY,
  user TEXT NOT NULL REFERENCES users(username),
  event INTEGER NOT NULL REFERENCES events(eid) ON DELETE CASCADE,
  comment TEXT NOT NULL
);

INSERT INTO users VALUES (NULL, 'ricardo@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'ricardosousa', 'Ricardo Sousa');

INSERT INTO users VALUES (NULL, 'bardolos@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'bardolos', 'Bardolos');

INSERT INTO users VALUES (NULL, 'anapereira@hotmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'ana_pereira', 'Ana Pereira');

INSERT INTO users VALUES (NULL, 'nunoalmeida@hotmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'nuno.almeida', 'Nuno Almeida');

INSERT INTO events VALUES (62, 4, 'Launch Gala', 'party', 'Evento de moda', '13-04-2019', '14-04-2019', '21:30', '02:00', 'private', 'New York');

INSERT INTO events VALUES (12, 4, 'The Mountain Goats Concert', 'concert', 'Concerto de indie rock', '01-05-2019', '02-05-2019', '21:30', '02:00', 'private', 'Paris');

INSERT INTO events VALUES (3, 3, 'Black Keys Concert', 'concert', 'Concerto de Verao', '05-07-2021', '06-07-2021', '23:00', '01:00', 'public', 'Roma');

INSERT INTO events VALUES (7, 3, 'Electrelane Concert', 'concert', 'Concerto de Verao', '01-08-2024', '01-08-2024', '22:30', '23:45', 'public', 'Lisbon');

INSERT INTO events VALUES (10, 2, 'Festa Natal', 'party', 'A festa de Natal do ano', '21-12-2015', '23-12-2015', '00:00', '01:00', 'public', 'Gaia');

INSERT INTO events VALUES (32, 2, 'Festa Halloween', 'party', 'A festa de Halloween do ano',  '16-10-2015', '16-10-2015', '00:00', '02:30', 'public', 'Miami');

INSERT INTO events VALUES (8, 2, 'Childish Gambino Concert', 'concert', 'Concerto de Verao', '03-08-2027', '04-08-2027', '22:30', '00:00', 'public', 'LA');

INSERT INTO events VALUES (6, 1, 'Concerto Radiohead', 'concert', 'O concerto do ano', '01-06-2020', '01-06-2020', '00:00', '01:00', 'public', 'Porto');

INSERT INTO events VALUES (14, 1, 'Conferencia Final Ano', 'conference', 'A conferencia do ano', '18-12-2016', '19-12-2016', '17:00', '18:00', 'public', 'Espinho');

INSERT INTO events VALUES (60, 1, 'Festa Infantil', 'party', 'A festa infantil do ano', '01-06-2020', '01-06-2020', '14:30', '16:00', 'public', 'Porto');

INSERT INTO events VALUES (80, 1, 'Festa Infantil', 'party', 'A segunda festa infantil do ano', '12-07-2030', '12-07-2030', '15:00', '18:00', 'public', 'Porto');

INSERT INTO events VALUES (100, 1, 'London Conference', 'conference', 'Conferencia anual', '26-10-2030', '30-10-2030', '18:00', '21:00', 'private', 'London');

INSERT INTO invites VALUES (1, 62, 0);

INSERT INTO invites VALUES (4, 60, 0);

INSERT INTO invites VALUES (2, 80, 0);

INSERT INTO invites VALUES (2, 7, 0);

INSERT INTO joins VALUES (3, 32);

INSERT INTO joins VALUES (4, 80);
