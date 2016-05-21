DROP TABLE IF EXISTS test.documents;
CREATE TABLE test.documents
(
	id		INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
	key_word		VARCHAR(255) NOT NULL,
	answer		TEXT NOT NULL
) DEFAULT CHARSET=utf8;

REPLACE INTO test.documents ( id, key_word, answer ) VALUES
	( 1, 'яблоко цена', '50 рублей' ),
	( 2, 'апельсин цена', '70 рублей' ),
	( 3, 'яблоко', 'фрукт' );
