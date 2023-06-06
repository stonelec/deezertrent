INSERT INTO public.art (id_type, nom_type)
VALUES
    (DEFAULT, 'Solo'),
    (DEFAULT, 'Groupe'),
    (DEFAULT, 'Musicien');

INSERT INTO public.style_A (id_style, nom_style)
VALUES
    (DEFAULT, 'variété'),
    (DEFAULT, 'pop rock'),
    (DEFAULT, 'rock alternatif'),
    (DEFAULT, 'heavy metal');

INSERT INTO public.artiste (id_artiste, nom_artiste, id_type)
VALUES
    (DEFAULT, 'AC/DC', 2),
    (DEFAULT, 'Imagine Dragons', 2),
    (DEFAULT, 'Nirvana', 2),
    (DEFAULT, 'Francky Vincent', 1),
    (DEFAULT, 'Chawki', 1);

INSERT INTO public.album (id_album, titre_album, date_parution, image_album, id_artiste, id_style)
VALUES
    (DEFAULT, 'Night Visions', '2012-09-04', 'NightVisions.jpg', 2, 2),
    (DEFAULT, 'NeverMind', '1991-09-24', 'NeverMind.jpg', 3, 3),
    (DEFAULT, 'Mon fest''of', '2009-07-05', 'MonFestOf.jpg', 4, 1),
    (DEFAULT, 'Back In Black', '2015-01-02', 'BackInBlack.jpg', 1, 4),
    (DEFAULT, '100% Ambiance Staifi et Chawi', '2015-09-02', 'AmbianceStaifietChawi.jpg', 5, 1);


INSERT INTO public.track (id_track, titre_track, duree, lien_track, id_album)
VALUES
    (DEFAULT, 'Radioactive', 186, 'https://cdns-preview-b.dzcdn.net/stream/c-b53be55456ff326e9c2a7bf1d0abe601-6.mp3', 1),
    (DEFAULT, 'Tiptoe', 187, 'https://cdns-preview-7.dzcdn.net/stream/c-77839cabb61744a313533376023640be-6.mp3', 1),
    (DEFAULT, 'It''s Time', 240, 'https://cdns-preview-8.dzcdn.net/stream/c-8c34865d75ba54347538453d42595cdb-6.mp3', 1),
    (DEFAULT, 'Demons', 177, 'https://cdns-preview-f.dzcdn.net/stream/c-f69a51d64ef9368d16bb9c880ab4a949-6.mp3', 1),
    (DEFAULT, 'On Top Of The World', 192, 'https://cdns-preview-6.dzcdn.net/stream/c-662cbe193b95de04d4a2dccbe28b572b-6.mp3', 1),
    (DEFAULT, 'Smell Like Teen Spirit', 301, 'https://cdns-preview-3.dzcdn.net/stream/c-358eb79e55e30b4719d976e15d41e230-8.mp3', 2),
    (DEFAULT, 'In Bloom', 255, 'https://cdns-preview-2.dzcdn.net/stream/c-246c6790d07404bb310996803d86f47d-8.mp3', 2),
    (DEFAULT, 'Come As You Are', 218, 'https://cdns-preview-d.dzcdn.net/stream/c-d92af1ae1e9c12708b22863d9d4475de-8.mp3', 2),
    (DEFAULT, 'Breed', 184, 'https://cdns-preview-3.dzcdn.net/stream/c-381fc464d5e35bc13a8f0a1d49ac76df-8.mp3', 2),
    (DEFAULT, 'Le tourement d''amour', 229, 'https://cdns-preview-4.dzcdn.net/stream/c-40c8421927f5430118f4bd5e4aa90022-5.mp3', 3),
    (DEFAULT, 'Fruit de la passion', 238, 'https://cdns-preview-6.dzcdn.net/stream/c-6b5d99cf8c960266954415aadb1f7d7f-5.mp3', 3),
    (DEFAULT, 'Tu veux mon zizi', 198, 'https://cdns-preview-3.dzcdn.net/stream/c-33311499dd8cc31f13f69aeea0ad65c9-3.mp3', 3),
    (DEFAULT, 'Hells Bells', 312, 'https://cdns-preview-0.dzcdn.net/stream/c-0a2d2db6156fb742d5522cfdc7d70d32-6.mp3', 4),
    (DEFAULT, 'Shoot To Thrill', 317, 'https://cdns-preview-b.dzcdn.net/stream/c-b452a7657deb986bb0d34c9518c3257d-5.mp3', 4),
    (DEFAULT, 'Ya ghali arouah', 246, 'https://cdns-preview-1.dzcdn.net/stream/c-198ac504cbfa7e1a5fe9d9e115693057-3.mp3', 5),
    (DEFAULT, 'Antia Zina', 173, 'https://cdns-preview-1.dzcdn.net/stream/c-152d74f04f3dd6fd1db8c4d6c65959b5-3.mp3', 5);

INSERT INTO playlist (nom_playlist, date_creation, id_user)
VALUES
    ('Historique','05-06-2023' , 12),
    ('Liste de lecture', '05-06-2023', 12 ),
    ('Favoris', '05-06-2023', 12),
    ('Historique','05-06-2023' , 13),
    ('Liste de lecture', '05-06-2023', 13 ),
    ('Favoris', '05-06-2023', 13);

INSERT INTO comprendre (id_track, id_playlist, date_ajout)
VALUES
    (3, 2, CURRENT_TIMESTAMP),
    (4, 2, CURRENT_TIMESTAMP),
    (10, 2, CURRENT_TIMESTAMP);


INSERT INTO comprendre (id_track, id_playlist, date_ajout)
VALUES
    (3, 5, CURRENT_TIMESTAMP),
    (4, 5, CURRENT_TIMESTAMP),
    (10, 5, CURRENT_TIMESTAMP);
