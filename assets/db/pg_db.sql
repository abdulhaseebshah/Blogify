-- Adminer 4.8.1 PostgreSQL 16.2 (Debian 16.2-1.pgdg120+2) dump

\connect "blogify";

DROP TABLE IF EXISTS "blogs";
DROP SEQUENCE IF EXISTS blogs_id_seq;
CREATE SEQUENCE blogs_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."blogs" (
    "id" integer DEFAULT nextval('blogs_id_seq') NOT NULL,
    "title" character varying,
    "description" character varying NOT NULL,
    "image" character varying NOT NULL,
    "user_id" integer NOT NULL,
    "date" character varying,
    "time" character varying,
    CONSTRAINT "blogs_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "blogs" ("id", "title", "description", "image", "user_id", "date", "time") VALUES
(3,	'Hello',	'World',	'Screenshot_20240318_040151.png',	1,	'2024-03-21',	'08:16:41'),
(4,	'Hello Blog 2',	'This is ',	'Screenshot_20240312_023816.png',	1,	'2024-03-21',	'08:20:46');

DROP TABLE IF EXISTS "users";
DROP SEQUENCE IF EXISTS users_id_seq;
CREATE SEQUENCE users_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."users" (
    "id" integer DEFAULT nextval('users_id_seq') NOT NULL,
    "username" character varying NOT NULL,
    "password" character varying NOT NULL,
    CONSTRAINT "users_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "users" ("id", "username", "password") VALUES
(1,	'admin',	'admin');

-- 2024-03-21 08:32:14.730158+00
