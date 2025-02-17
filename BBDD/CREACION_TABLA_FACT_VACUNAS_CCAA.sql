CREATE TABLE FACT_VACUNAS_CCAA (
	FECHA DATE NOT NULL,
	ID_TIPO INT NOT NULL FOREIGN KEY REFERENCES DIM_TIPOS_VACUNAS(ID_TIPO),
	COD_CCAA INT NOT NULL FOREIGN KEY REFERENCES DIM_CCAA(COD_CCAA),
	DOSIS_ADMINISTRADAS FLOAT,
	DOSIS_RECIBIDAS FLOAT,
	PORCENTAJE_ADM_RECIB FLOAT
	PRIMARY KEY (FECHA, ID_TIPO, COD_CCAA)
);