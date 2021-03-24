-- données pour waz_biens 
DELETE FROM waz_biens;

INSERT INTO `waz_biens` (`bi_id`,`bi_type`,`bi_pieces`,`bi_ref`,`bi_description`,`bi_local`,`bi_surf_habitable`,
                        `bi_surf_totale`,`bi_estimations_vente`,`bi_estimation_location`,`bi_diagnostic`) 
VALUES  (1,"appartement","+6","MA-0321-01","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
        Curabitur sed tortor. Integer aliquam adipiscing lacus.","Vito d'Asio","85","110","154981.56€","428.54€","D"),
        (2,"terrain","5","TE-0321-01","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
        Curabitur sed tortor.Integer aliquam adipiscing","Muzaffarpur","90","120","181688.11€","296.36€","G"),
        (3,"bureaux","1","BU-0321-01","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
        Curabitur sed tortor.Integer aliquam adipiscing lacus.","Manavgat","95","140","56558.31€","670.43€","A"),
        (4,"maison","4","MA-0321-01","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor.
         Integer aliquam","Bastogne","100","150","119840.95€","400.73€","A"),
        (5,"appartement","4","AP-0321-01","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
        Curabitur sed tortor.Integer aliquam adipiscing","Gateshead","115","155","169556.72€","222.23€","F"),
        (6,"bureaux","+6","BU-0321-02","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
        Curabitur sed tortor.Integer aliquam adipiscing lacus.","Solnechnogorsk","85","110","172110.14€","505.91€","V"),
        (7,"immeuble","1","IM-0321-01","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed",
        "Annone di Brianza","90","120","149746.93€","644.37€","B"),
        (8,"terrain","3","TE-0321-02","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed",
        "Bauchi","95","140","80104.87€","567.45€","G"),
        (9,"bureaux","4","BU-0321-03","Lorem ipsum dolor sit amet,consectetuer adipiscing elit. Curabitur sed tortor.
         Integer","Falisolle","100","150","138088.25€","366.37€","F"),
        (10,"appartement","5","MA-0321-02","Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
     Curabitur sed tortor. Integer aliquam adipiscing lacus.","San Luis Potosí","115","155","108346.25€","611.48€","D");

-- données pour waz_photos
DELETE FROM waz_photos;

INSERT INTO `waz_photos` (`pho_id`, `pho_nom`, `bi_id`) VALUES
(1, 'nom1', 0),
(2, 'nom2', 1),
(3, 'nom3', 2),
(4, 'nom4', 1),
(5, 'nom5', 3),
(6, 'nom6', 2),
(7, 'nom7', 2),
(8, 'nom8', 6),
(9, 'nom9', 8),
(10, 'nom10', 9);

-- données pour waz_employes
DELETE FROM waz_employes;

INSERT INTO `waz_employes` (`emp_id`,`emp_nom`,`emp_prenom`,`emp_adresse`,`emp_tel`,`emp_mail`,`emp_poste`,`emp_mdp`) 
VALUES (1,"Roberson","Tiger","CP 129, 2067 Vestibulum Chemin","05 92 16 16 15","ornare@neque.net","secretaire",
        "DRR97WEL5JS"),
        (2,"Murray","Maryam","3426 Pede Impasse","07 02 13 28 28","quis.lectus.Nullam@Praesenteu.com","directeur","
        FSO42LWW3SJ"),
        (3,"Russo","Farrah","CP 229, 1578 Ullamcorper Route","05 40 73 06 58","id.blandit.at@euenim.co.uk",
        "secretaire","NTW50QQP0NV"),
        (4,"Flores","Imani","7117 Proin Rue","01 42 34 84 53","vestibulum.Mauris@massalobortisultrices.org",
        "secretaire","YXM22WGU8EJ"),
        (5,"English","Nolan","9372 Nonummy Route","02 19 23 66 54",
        "porttitor.vulputate.posuere@justoProin.org","secretaire","OCJ05CTQ4WX"),
        (6,"Christian","Hamilton","8095 Vitae Av.","01 51 14 36 53","nec.ante@acsemut.org","secretaire","AXA06VKO6BD"),
        (7,"Bernard","Kirk","CP 811, 8358 Vestibulum, Route","06 48 27 77 42","est.tempor@egestasFuscealiquet.edu",
        "negociateur_immobilier","RTF05XZI6NV"),
        (8,"Mathis","Angela","Appartement 397-7856 Bibendum Rd.","06 39 05 50 28",
        "nonummy.ac.feugiat@vitaeorciPhasellus.org","negociateur_immobilier","TVJ44LBL4QV"),
        (9,"Sweeney","Iola","626-7591 Pellentesque Rue","07 19 66 11 30","sem.magna@amet.org","negociateur_immobilier",
        "NAB63YZU9BB"),
        (10,"Kirkland","Dakota","697-7911 Turpis Rd.","03 73 70 55 27","vel.nisl@sitamet.ca","negociateur_immobilier",
        "WHA89IMT7EC");

--données waz_internautes
DELETE FROM waz_internautes;

INSERT INTO  `waz_internautes` (`in_id`,`in_nom`,`in_prenom`,`in_adresse`,`in_telephone`,`in_email`,`in_pays`) 
VALUES (1,"Martinez","Madison","1415 Sem Chemin","09 64 46 79 86","eget.nisi@montesnasceturridiculus.co.uk","Malta"),
(2,"Burch","Orla","Appartement 292-7086 Leo Impasse","04 23 21 74 20","est@eusem.org","Svalbard and Jan Mayen Islands"),
(3,"Simmons","Caldwell","CP 716, 6262 Nisi Rue","09 99 92 38 84","mauris@ornare.ca","Virgin Islands, United States"),
(4,"Ray","Tatiana","716-8345 Nunc Route","07 90 89 41 70","ligula.elit.pretium@adipiscingenimmi.edu","Venezuela"),
(5,"Kramer","Ralph","CP 241, 7935 Class Rue","08 50 45 48 93","sapien.cursus@necmalesuadaut.com","Nicaragua"),
(6,"Austin","Uriah","265-7153 Auctor Rd.","05 37 59 78 23","odio.sagittis@necluctusfelis.org","Bulgaria"),
(7,"Barker","Winifred","Appartement 795-6754 Fringilla Ave","02 09 64 95 47","ante.dictum@semmollisdui.org","Myanmar"),
(8,"Lara","Aladdin","963-901 Diam Rd.","09 20 45 73 02","id.risus@ligulaNullamfeugiat.net","Macao"),
(9,"Payne","Simon","899-1417 Arcu. Rue","05 84 93 77 26","in.dolor@mauris.ca","Åland Islands"),
(10,"Clarke","Nathan","CP 419, 4952 Lacus. Chemin","07 42 71 90 76","pede.nonummy.ut@penatibus.co.uk","Syria");

--données waz_annonces
DELETE FROM waz_annonces;

INSERT INTO `waz_annonces` (`an_id`, `an_prix`, `est_active`, `an_ref`, `an_date_disponibilite`, `an_offre`,
`an_nbre_vues`, `an_date_ajout`, `an_date_modif`, `an_titre`, `bi_id`) 
VALUES
(1, '151.00', 1, 'VE-MA-0121-01', '2021-08-26', 'A', 326, '2021-02-21', NULL, 'purus sapien, gravida non, sollicitudin 
a,malesuada id, erat. Etiam', 1),
(2, '79.00', 0, 'LO-TE-0121-01', '2021-06-14', 'L', 328, '2021-06-10', '2021-08-03 15:16:34', 'eu erat semper rutrum.
Fusce dolor quam, elementum at, egestas', 2),
(3, '51.00', 1, 'VE-AP-0121-01', '2021-10-23', 'V', 481, '2021-08-12', NULL, 'arcu imperdiet ullamcorper. Duis at lacus. 
Quisque purus sapien, gravida', 3),
(4, '71.00', 0, 'LO-MA-0121-01', '2021-12-14', 'A', 122, '2021-12-04', NULL, 'dolor. Fusce mi lorem, vehicula et, rutrum 
eu, ultrices sit', 4),
(5, '141.00', 1, 'VE-MA-0121-01', '2021-09-03', 'L', 106, '2021-04-16', '2021-07-13 01:54:31', 'id, ante. Nunc mauris 
sapien,cursus in, hendrerit consectetuer, cursus', 5),
(6, '57.00', 0, 'LO-TE-0121-01', '2021-10-22', 'V', 108, '2021-08-10', NULL, 'Etiam ligula tortor, dictum eu, placerat 
eget,venenatis a, magna.', 6),
(7, '63.00', 1, 'VE-AP_0121-01', '2021-10-06', 'A', 252, '2021-03-12', '2021-12-02 20:43:05', 'sed dui. Fusce aliquam, 
enim nec tempus scelerisque, lorem ipsum', 7),
(8, '87.00', 0, 'LO-MA-0121-01', '2021-09-09', 'L', 92, '2022-01-21', '2021-05-25 07:43:23', 'arcu. 
Aliquam ultrices iaculis odio. Nam interdum enim non nisi.', 8),
(9, '128.00', 1, 'LO-TE-0121-01', '2021-03-18', 'V', 485, '2021-03-18', '2022-01-01 15:16:44', 'sodales nisi magna
 sed dui.Fusce aliquam, enim nec tempus', 9),
(10, '183.00', 0, 'VE-MA-0121-01', '2021-07-20', 'A', 165, '2021-03-16', NULL, 'massa. Integer vitae nibh. 
Donec est mauris,rhoncus id, mollis', 10);


-- donnée pour waz_commentaire
DELETE FROM waz_commentaire;

DELETE FROM waz_commentaire;
INSERT INTO `waz_commentaire` (`co_id`,`co_avis`,`co_notes`,`co_date_ajout`,`in_id`)
VALUES (1,"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. 
Integer aliquam adipiscing lacus. Ut nec urna et arcu",3,"2021-03-28 00:41:11","0"),
(2,"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus."
,4,"2021-03-17 15:50:24","1"),
(3,"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. 
Integer aliquam adipiscing lacus. Ut nec urna",5,"2021-03-30 09:05:15","2"),
(4,"Lorem",5,"2021-03-31 06:39:46","3"),(5,"Lorem ipsum dolor sit amet,",5,"2021-03-22 15:30:45","4"),
(6,"Lorem ipsum dolor sit amet, consectetuer",3,"2021-03-10 21:51:42","2"),
(7,"Lorem ipsum dolor sit amet, consectetuer adipiscing",1,"2021-03-29 18:50:51","4"),
(8,"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. 
Ut nec urna et",3,"2021-03-19 19:25:18","3"),(9,"Lorem ipsum dolor sit amet, consectetuer",
3,"2021-03-20 17:09:05","7"),
(10,"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus.
Ut nec",1,"2021-03-15 07:12:48","1");

-- donnée pour waz_composer

DELETE FROM waz_composer;
INSERT INTO `waz_composer` (`bi_id`,`opt_id`) 
VALUES ("10","4"),("2","3"),("2","6"),("5","2"),("10","6"),("7","7"),("6","6"),("4","4"),("10","12"),("8","3");

-- donnée pour waz_negocier
DELETE FROM waz_negocier;

INSERT INTO `waz_negocier` (`emp_id`, `in_id`, `an_id`, `est_conclu`, `montant_transaction`, 
`date_debut_transaction`, `date_transaction_fin`, `date_dernier_contact`) 
VALUES
(7, 1, 1, 1, '120.00', '2021-01-27', '2021-02-17', '2021-02-17'),
(7, 5, 5, 1, '105.00', '2021-01-18', '2021-02-20', '2021-02-20'),
(7, 9, 9, 0, '174.00', '2021-01-21', NULL, '2021-02-17'),
(8, 2, 2, 0, '76.00', '2021-01-05', NULL, '2021-03-14'),
(8, 6, 6, 0, '36.00', '2021-01-17', NULL, '2021-01-24'),
(8, 10, 10, 0, '178.00', '2021-01-11', NULL, '2021-01-18'),
(9, 3, 3, 1, '59.00', '2021-01-08', '2021-02-13', '2021-03-11'),
(9, 7, 7, 1, '180.00', '2021-01-24', '2021-02-27', '2021-03-05'),
(10, 4, 4, 0, '122.00', '2021-01-05', NULL, '2021-02-17'),
(10, 8, 8, 0, '120.00', '2021-01-15', NULL, '2021-01-29');

-- donnée pour waz_contacter
DELETE FROM waz_contacter;

INSERT INTO `waz_contacter` (`emp_id`,`in_id`,`sujet`,`question`) 
VALUES ("7","1","Louer","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. 
Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus"),
("8","2","Acheter","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor.
Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus."),
("9","3","Vendre","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. 
Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque"),
("10","4","Autres","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. 
Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet"),
("7","5","Louer","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor.
Integer aliquam adipiscing lacus. Ut nec urna et arcu"),
("8","6","Acheter","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor.
Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien,"),
("9","7","Vendre","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. 
Integer aliquam adipiscing lacus."),
("10","8","Autres","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor."),
("7","9","Louer","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor.
Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. 
Quisque purus sapien, gravida"),
("8","10","Acheter","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed");





