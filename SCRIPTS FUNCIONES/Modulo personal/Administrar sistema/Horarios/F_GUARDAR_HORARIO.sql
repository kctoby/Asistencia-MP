-------------------	A D M I N I S T R A R     S I S T E M A 	H O R A R I O S		-------------------
--Función para guardar cuando se crea el horario
CREATE OR REPLACE FUNCTION "PERMISOS".F_GUARDAR_HORARIO(IN P_TIPO_HORARIO CHARACTER VARYING(60), 
							IN P_DIAS_SEMANA CHARACTER VARYING(30),
							IN P_HORA_INICIO TIME WITHOUT TIME ZONE, 
							IN P_HORA_FIN TIME WITHOUT TIME ZONE) 
RETURNS VOID AS $$
DECLARE
v_horas_trabajadas integer;
v_fecha_creacion timestamp without time zone;
v_fecha_modificacion timestamp without time zone;
v_hora_inicio_int double precision;
v_hora_fin_int double precision;
BEGIN
	--Obtener la fecha actual
	v_fecha_creacion:= to_char(current_timestamp, 'DD/MM/YYYY HH24:MI:SS')::timestamp without time zone;
	v_fecha_modificacion := v_fecha_creacion;
	v_hora_inicio_int := (SELECT EXTRACT(HOUR FROM P_HORA_INICIO));
	v_hora_fin_int := (SELECT EXTRACT(HOUR FROM P_HORA_FIN));
	
	--Calcular las horas que se tienen que trabajar de acuerdo a la hora de entrada y salida.
	v_horas_trabajadas := (v_hora_fin_int - v_hora_inicio_int)::integer;

	INSERT INTO "PERMISOS"."TBL_TIPOS_HORARIOS"("TIPO_HORARIO", "HORAS_TRABAJADAS", "DIAS_SEMANA", 
		    "HORA_INICIO", "HORA_FIN", "FECHA_CREACION", "FECHA_MODIFICACION")
	VALUES (P_TIPO_HORARIO, v_horas_trabajadas, P_DIAS_SEMANA, 
		P_HORA_INICIO, P_HORA_FIN, v_fecha_creacion, v_fecha_modificacion);

	
END;
$$ LANGUAGE 'plpgsql';

--Ejecutar la función
SELECT * FROM "PERMISOS".F_GUARDAR_HORARIO('HORARIO PRUEBA', 'Mo-Tu-We', '07:00:00', '17:00:00');