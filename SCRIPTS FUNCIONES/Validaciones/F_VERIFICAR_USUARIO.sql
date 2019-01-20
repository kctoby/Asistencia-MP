--Funcion de loggear devolviendo el nombre_completo, id tipo usuario y el id del empleado.
CREATE OR REPLACE FUNCTION "PERMISOS".F_VERIFICAR_USUARIO(IN P_NOMBRE_USUARIO CHARACTER VARYING(100), 
	IN P_CONTRASENIA CHARACTER VARYING(100), OUT P_NOMBRE_COMPLETO text, OUT P_ID_TIPO_USUARIO INTEGER, 
	OUT P_ID_EMPLEADO CHARACTER VARYING(10)) 
RETURNS SETOF record AS 
$BODY$
DECLARE 
  v_cantidad INTEGER;  
  v_id_tipo_usr INTEGER;
  v_id_tjefe INTEGER;
  v_id_tjpersonal INTEGER;
  v_id_tjtemporal INTEGER;
  v_id_templeado_normal INTEGER;
  v_fecha_inicio DATE;
  v_fecha_fin DATE;
  v_fecha_actual DATE;
  v_id_empleado CHARACTER VARYING;
 BEGIN
	v_fecha_actual := CURRENT_DATE;

	SELECT A."ID_EMPLEADO" INTO v_id_empleado
	FROM "PERMISOS"."TBL_EMPLEADOS" A
	WHERE A."NOMBRE_USUARIO" = P_NOMBRE_USUARIO AND
	A."CONTRASENIA" = P_CONTRASENIA;

	--Si es 2 verificar que pueda acceder si esta en su rango de asignacion
	SELECT COUNT(*) INTO v_cantidad
	FROM "PERMISOS"."TBL_EMPLEADOS" A
	INNER JOIN "PERMISOS"."TBL_EMPLEADOS_X_TUSUARIO" B
	ON (A."ID_EMPLEADO" = B."ID_EMPLEADO")
	WHERE B."ID_EMPLEADO" = v_id_empleado AND B."ESTADO" = TRUE;

	SELECT A."ID_TIPO_USUARIO" INTO v_id_tjefe 
	FROM "PERMISOS"."TBL_TIPOS_USUARIOS" A
	WHERE A."TIPO_USUARIO" = 'JEFE';

	SELECT A."ID_TIPO_USUARIO" INTO v_id_tjtemporal 
	FROM "PERMISOS"."TBL_TIPOS_USUARIOS" A
	WHERE A."TIPO_USUARIO" = 'JEFE TEMPORAL';

	SELECT A."ID_TIPO_USUARIO" INTO v_id_templeado_normal 
	FROM "PERMISOS"."TBL_TIPOS_USUARIOS" A
	WHERE A."TIPO_USUARIO" = 'EMPLEADO';
	     
	SELECT A."ID_TIPO_USUARIO" INTO v_id_tjpersonal 
	FROM "PERMISOS"."TBL_TIPOS_USUARIOS" A
	WHERE A."TIPO_USUARIO" = 'EMPLEADO DE PERSONAL';  

	IF (v_cantidad = 1) THEN
		SELECT B."ID_TIPO_USUARIO", B."FECHA_INICIO", B."FECHA_FIN" INTO v_id_tipo_usr, v_fecha_inicio, v_fecha_fin
		FROM "PERMISOS"."TBL_EMPLEADOS" A
		INNER JOIN "PERMISOS"."TBL_EMPLEADOS_X_TUSUARIO" B
		ON (A."ID_EMPLEADO" = B."ID_EMPLEADO")
		WHERE B."ID_EMPLEADO" = v_id_empleado AND B."ESTADO" = TRUE;

		IF (v_id_tipo_usr = v_id_tjefe OR v_id_tipo_usr = v_id_templeado_normal OR  v_id_tipo_usr = v_id_tjpersonal) THEN
			RETURN query SELECT A."PRIMER_SEGUNDO_NOMBRE" ||' ' || A."PRIMER_SEGUNDO_APELLIDO" AS P_NOMBRE_COMPLETO, 
					B."ID_TIPO_USUARIO", A."ID_EMPLEADO"
			FROM "PERMISOS"."TBL_EMPLEADOS" A
			INNER JOIN "PERMISOS"."TBL_EMPLEADOS_X_TUSUARIO" B
			ON(A."ID_EMPLEADO" = B."ID_EMPLEADO")
			INNER JOIN "PERMISOS"."TBL_TIPOS_USUARIOS" C
			ON(B."ID_TIPO_USUARIO" = C."ID_TIPO_USUARIO")
			WHERE B."ID_EMPLEADO" = v_id_empleado 
				AND A."NOMBRE_USUARIO" = P_NOMBRE_USUARIO AND
				A."CONTRASENIA" = P_CONTRASENIA AND
				B."ESTADO" = TRUE;
				
			ELSE IF(v_id_tipo_usr = v_id_tjtemporal)THEN
					IF(v_fecha_inicio >=  v_fecha_actual AND  v_fecha_actual <= v_fecha_fin) THEN
						RETURN query SELECT A."PRIMER_SEGUNDO_NOMBRE" ||' ' || A."PRIMER_SEGUNDO_APELLIDO" AS NOMBRE_APELLIDO, 
									B."ID_TIPO_USUARIO", A."ID_EMPLEADO"
								FROM "PERMISOS"."TBL_EMPLEADOS" A
								INNER JOIN "PERMISOS"."TBL_EMPLEADOS_X_TUSUARIO" B
								ON(A."ID_EMPLEADO" = B."ID_EMPLEADO")
								INNER JOIN "PERMISOS"."TBL_TIPOS_USUARIOS" C
								ON(B."ID_TIPO_USUARIO" = C."ID_TIPO_USUARIO")
								WHERE B."ID_EMPLEADO" = v_id_empleado AND 
									A."NOMBRE_USUARIO" = P_NOMBRE_USUARIO AND
									A."CONTRASENIA" = P_CONTRASENIA AND
									B."ESTADO" = TRUE;
					 ELSE
						INSERT INTO "PERMISOS"."TBL_EMPLEADOS_X_TUSUARIO"(
							"ID_TIPO_USUARIO", "ID_EMPLEADO", "FECHA_AGREGADO", "FECHA_INICIO", 
							"FECHA_FIN", "ESTADO")
						VALUES (v_id_templeado_normal, v_id_empleado, v_fecha_actual, null, null, '1');

					 
						UPDATE "PERMISOS"."TBL_EMPLEADOS_X_TUSUARIO"
						SET "ESTADO"= FALSE
						WHERE "ID_EMPLEADO" = v_id_empleado AND "ID_TIPO_USUARIO" = v_id_tipo_usr ;
					 END IF;
			END IF;	
		END IF;

	END IF;
	
    RETURN;
   
 END;
$BODY$ 
LANGUAGE 'plpgsql';

--Ejecutar, tiene que ir con el * porque sino sale de otra manera
SELECT * FROM "PERMISOS".F_VERIFICAR_USUARIO('Vladimir.Ramirez', 'ULEnSNl');		--TEMPORAL

SELECT * FROM "PERMISOS".F_VERIFICAR_USUARIO('Alfredo.Dormes', 'bgCSWh4');		--EMPLEADO

