-- =====================================================================================
-- 2022 : projet généalogie
-- =====================================================================================

insert into famille (id, nom) values (1002, 'HALLIDAY');
insert into individu (famille_id, id, nom, prenom, sexe, pere, mere) values (1002, 0, '?', '?', '?', 0, 0);
insert into individu values (1002, 1, 'SMET (HALLIDAY)', 'jean philippe léo', 'H', 0, 0);
insert into evenement values (1002, 1, 1, 'NAISSANCE', '1943-06-15', '75009 Paris France');
insert into evenement values (1002, 2, 1, 'DECES', '2017-12-05', '92430 Marne-La-Coquette France');
insert into individu values (1002, 2, 'ETIENNE', 'elisabeth odette olympe', 'F', 0, 0);
insert into evenement values (1002, 3, 2, 'NAISSANCE', '1957-06-06', '92150 Suresnes France');
insert into lien values (1002, 1, 1, 2, 'MARIAGE', NULL, '?');
insert into individu values (1002, 3, 'BLONDIEAU', 'adeline', 'F', 0, 0);
insert into evenement values (1002, 4, 3, 'NAISSANCE', '1971-02-09', '75000 Paris');
insert into lien values (1002, 2, 1, 3, 'MARIAGE', NULL, '?');
insert into individu values (1002, 4, 'BOUDOU', 'laétitia marie christine', 'F', 0, 0);
insert into evenement values (1002, 5, 4, 'NAISSANCE', '1975-03-18', '?');
insert into lien values (1002, 3, 1, 4, 'MARIAGE', NULL, '?');
insert into individu values (1002, 5, 'BAYE', 'nathalie', 'F', 0, 0);
insert into evenement values (1002, 6, 5, 'NAISSANCE', '1948-07-06', '54150 Mainville France');
insert into lien values (1002, 4, 1, 5, 'COUPLE', NULL, '?');
insert into individu values (1002, 6, 'VARTAN', 'sylvie', 'F', 0, 0);
insert into evenement values (1002, 7, 6, 'NAISSANCE', '1944-08-15', 'Iskretz Bulgarie');
insert into lien values (1002, 5, 1, 6, 'MARIAGE', '1965-04-12', '60367 Loconville France');
insert into individu values (1002, 7, 'SMET', 'david michael benjamin', 'H', 0, 0);
insert into evenement values (1002, 8, 7, 'NAISSANCE', '1966-08-14', '92100 Boulogne-Billancourt France');
update individu set pere = 1 where id = 7 and famille_id = 1002;
update individu set mere = 6 where id = 7 and famille_id = 1002;
insert into individu values (1002, 8, 'SMET', 'laura', 'F', 0, 0);
insert into evenement values (1002, 9, 8, 'NAISSANCE', '1983-11-15', '92051 Neuilly-sur-Seine');
update individu set pere = 1 where id = 8 and famille_id = 1002;
update individu set mere = 5 where id = 8 and famille_id = 1002;
insert into individu values (1002, 9, 'SMET', 'jade odette', 'F', 0, 0);
update individu set pere = 1 where id = 9 and famille_id = 1002;
update individu set mere = 4 where id = 9 and famille_id = 1002;
insert into individu values (1002, 10, 'SMET', 'joy', 'F', 0, 0);
update individu set pere = 1 where id = 10 and famille_id = 1002;
update individu set mere = 4 where id = 10 and famille_id = 1002;
insert into individu values (1002, 11, 'LEFEBURE', 'estelle', 'F', 0, 0);
insert into evenement values (1002, 10, 11, 'NAISSANCE', '1966-05-11', 'Rouen');
insert into lien values (1002, 6, 7, 11, 'MARIAGE', '1989-09-15', 'Freneuse-sur-Risle');
insert into lien values (1002, 7, 7, 11, 'DIVORCE', '2001-02-00', '?');
insert into individu values (1002, 12, 'SMET', 'emma', 'F', 0, 0);
insert into evenement values (1002, 11, 12, 'NAISSANCE', '1997-09-13', '?');
update individu set pere = 7 where id = 12 and famille_id = 1002;
update individu set mere = 11 where id = 12 and famille_id = 1002;
insert into individu values (1002, 13, 'SMET', 'ilona', 'F', 0, 0);
update individu set pere = 7 where id = 13 and famille_id = 1002;
update individu set mere = 11 where id = 13 and famille_id = 1002;
insert into individu values (1002, 14, 'PASTOR', 'alexandra', 'F', 0, 0);
insert into evenement values (1002, 12, 14, 'NAISSANCE', '1976', '?');
insert into lien values (1002, 8, 7, 14, 'MARIAGE', '2004-06-03', '?');
insert into individu values (1002, 15, 'SMET', 'cameron', 'F', 0, 0);
update individu set pere = 7 where id = 15 and famille_id = 1002;
update individu set mere = 14 where id = 15 and famille_id = 1002;
insert into individu values (1002, 16, 'LANCREY-JAVA', 'léo', 'H', 0, 0);
update individu set mere = 8 where id = 16 and famille_id = 1002;