CREATE TABLE FACT_COVID_M(
	FECHA DATE NOT NULL,
	MUNICIPIO VARCHAR(255),
	Confirmados_PDIA INT,
	Confirmados_PDIA_7Dias INT,
	Confirmados_PDIA_14Dias INT,
	Tasa_PDIA_7Dias INT,
	Tasa_PDIA_14Dias INT,
	Total_Confirmados INT,
	Curados INT,
	Fallecidos INT
	PRIMARY KEY (FECHA,MUNICIPIO)
);