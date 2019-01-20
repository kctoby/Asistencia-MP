-------------------	A D M I N I S T R A R     S I S T E M A 	H O R A R I O S		-------------------
--Función para modificar un horario
--Tiene parametros de entrada: P_ID_TIPO_HORARIO es el que ingresa el de personal en buscar o digamos el que selecciona de la lista
--				P_RENOMBRE_TIPO_HORARIO es el nuevo nombre de tipo horario.
--				P_DIAS_SEMANA por si desea cambiarlo
--				P_HORA_INICIO es la hora inicio para el nuevo horario
--				P_HORA_FIN es la hora fin para el nuevo horario
CREATE OR REPLACE FUNCTION "PERMISOS".F_MODIFICAR_HORARIO(IN P_ID_TIPO_HORARIO INTEGER, 
							  IN P_RENOMBRE_TIPO_HORARIO CHARACTER VARYING(60),
							  IN P_DIAS_SEMANA CHARACTER VARYING(30),
							  IN P_HORA_INICIO TIME WITHOUT TIME ZONE, 
							  IN P_HORA_FIN TIME WITHOUT TIME ZONE) 
RETURNS VOID AS $$
DECLARE
	v_horas_trabajadas integer;
	v_fecha_modificacion timestamp without time zone;
	v_hora_inicio_int double precision;
	v_hora_fin_int double precision;
BEGIN
	v_fecha_modificacion:= to_char(current_timestamp, 'DD/MM/YYYY HH24:MI:SS')::timestamp without time zone;
	v_hora_inicio_int := (SELECT EXTRACT(HOUR FROM P_HORA_INICIO));
	v_hora_fin_int := (SELECT EXTRACT(HOUR FROM P_HORA_FIN));
	--Calcular las horas que se tienen que trabajar de acuerdo a la hora de entrada y salida.
	v_horas_trabajadas := (v_hora_fin_int - v_hora_inicio_int)::integer;

	UPDATE "PERMISOS"."TBL_TIPOS_HORARIOS"
	SET "TIPO_HORARIO" = P_RENOMBRE_TIPO_HORARIO, "HORAS_TRABAJADAS" = v_horas_trabajadas, 
	       "DIAS_SEMANA" = P_DIAS_SEMANA, "HORA_INICIO" = P_HORA_INICIO, "HORA_FIN" = P_HORA_FIN, 
	       "FECHA_MODIFICACION" = v_fecha_modificacion
	WHERE "ID_TIPO_HORARIO" = P_ID_TIPO_HORARIO;


END;
$$ LANGUAGE 'plpgsql';

--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
SELECT * FROM "PERMISOS".F_MODIFICAR_HORARIO(5,'HORARIO PRUEBA DOS', 'Th-Fr-Sa', '08:00:00', '18:00:00');