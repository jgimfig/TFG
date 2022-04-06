/****** Object:  Table [dbo].[CASOS_MUNICIPIOS]    Script Date: 06/04/2022 15:36:41 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[CASOS_MUNICIPIOS](
	[MUNICIPIO] [nvarchar](50) NULL,
	[MEDIDA] [nvarchar](50) NULL,
	[VALOR] [numeric](18, 0) NULL,
	[LOAD_DATE] [datetime] NULL
) ON [PRIMARY]
GO


