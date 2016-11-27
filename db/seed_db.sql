
DROP TABLE IF EXISTS 'urls';
CREATE TABLE IF NOT EXISTS 'urls' (
  'URL_ID' INTEGER PRIMARY KEY NOT NULL,
  'URL' varchar(200) default NULL
);

INSERT INTO 'urls' ('URL_ID', 'URL') VALUES
(1, 'https:\/\/www.google.com'),
(2, 'https:\/\/www.freecodecamp.com'),
(3, 'http:\/\/www.emant.altervista.com');

DROP TABLE IF EXISTS 'quotes1';
CREATE TABLE IF NOT EXISTS 'quotes1' (
  'Quote_ID' INTEGER PRIMARY KEY NOT NULL,
  'Name' varchar(100) default NULL,
  'Quote_Category' varchar(50) default NULL,
  'Quote' text
);

INSERT INTO 'quotes1' ('Quote_ID', 'Name', 'Quote_Category', 'Quote') VALUES
(1, 'Abbey, Edward', 'Individuality', 'In social institutions, the whole is always less than the sum of its parts. There will never be a state as good as its people, or a church worthy of its congregation, or a university equal to its faculty and students.'),
(2, 'Adams, George Matthew', 'Success', 'There is no such thing as a self-made man. We are made up of thousands of others. Everyone who has ever done a kind deed for us, or spoken one word of encouragement to us, has entered into the makeup of our character and our thoughts, as well as our success.'),
(3, 'Albani, Emma', 'Art', 'I had always loved beautiful and artistic things, though before leav'),
(4, 'Borman, Frank', 'Exploration', 'Exploration is really the essence of the human spirit.'),
(5, 'Yeats, William Butler', 'Business', 'The only business of the head in the world is to bow a ceaseless obeisance to the heart.'),
(6, 'Yen, Lu', 'Meditation', 'Though one sits in meditation in a particular place, the Self in him can exercise its influence far away.  Though still, it moves everywhere...The Self cannot be known by anyone who desists not from unrighteous ways, controls not his senses, stills not his mind, and practices not meditation.'),
(7, 'Yen, Lu', 'Religion', 'That which exists through itself is called The Eternal.  The Eternal has neither name nor shape.  It is the one essence, the one primal spirit.  Essence and life cannot be seen.  They are contained in the light of heaven.  The light of heaven cannot be seen.  It is contained in the two eyes.'),
(8, 'Yen, Lu', 'Thoughts', 'If the thoughts are absolutely tranquil the heavenly heart can be seen. The heavenly heart lies between sun and moon (i.e. between the two eyes). It is the home of the inner light.  To make light circulate is the deepest and most wonderful secret.  The light is easy to move, but difficult to fix.  If it is made to circulate long enought, then it crystallizes itself;  that is the natural spirit body...'),
(9, 'Yen, Lu', 'Thoughts', 'True thoughts have duration in themselves.  If the thoughts endure, the seed is enduring; if the seed endures, the energy endures; if the energy endures, then will the spirit endure.  The spirit is thought;  thought is the heart; the heart is the fire;  the fire is the Elixir.'),
(10, 'Yezirah, Sepher', 'Knowledge', 'Two stones build two houses, three stones build six houses, four build twenty-four houses, five build one hundred and twenty houses, six build seven hundred and twenty houses and seven build five thousand and forty houses.  From thence further go and reckon what the mouth cannot express and the ear cannot hear. '),
(11, 'Young, Edward', 'Future', 'Tomorrow is a satire on today, And shows its weakness.'),
(12, 'Young, Edward', 'Reflection', 'A soul without reflection, like a pile Without inhabitant, to ruin runs.'),
(13, 'Young, Edward', 'Solitude', 'By all means use some time to be alone.'),
(14, 'Young, Edward', 'Success', 'Too low they build who build below the skies.'),
(15, 'Young, Owen D.', 'Courage', 'It takes vision and courage to create-it takes faith and courage to prove.'),
(16, 'Zangwill, Israel', 'Selfishness', 'Selfishness is the only real atheism; aspiration, unselfishness, the only real religion.'),
(17, 'Zappa, Frank', 'Change', 'One of my favorite philosophical tenets is that people will agree with you only if they already agree with you. You do not change people''s minds.'),
(18, 'Zeno', 'Silence', 'Choose silence of all virtues, for by it you hear other men''s imperfections, and conceal your own.'),
(19, 'Zimmerman', 'Success', 'In Fame''s temple there is always a niche to be found for rich dunces, importunate scoundrels or successful butchers of the human race.'),
(20, 'Zohar', 'Creation', 'Before God manifested Himself, when all things were still hidden in Him... He began by forming an imperceptible point; that was His own thought. With this thought He then began to construct a mysterious and holy form... the Universe.');

DROP TABLE IF EXISTS 'img_queries';
CREATE TABLE IF NOT EXISTS 'img_queries' (
  'ID' INTEGER PRIMARY KEY,
  'term' VARCHAR(100),
  'time' DATETIME DEFAULT CURRENT_TIMESTAMP
);
