PGDMP     	    /    
            y            spe_db    13.1    13.1     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    16442    spe_db    DATABASE     Q   CREATE DATABASE spe_db WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'C';
    DROP DATABASE spe_db;
                postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
                raul    false            �           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                   raul    false    3            �            1259    16558    user    TABLE     �  CREATE TABLE public."user" (
    id integer NOT NULL,
    name character varying(250),
    email character varying(250),
    password character varying(250),
    mobno bigint,
    apellido character varying(250),
    username character varying(250),
    isactive character varying(1) DEFAULT 2,
    isadmin character varying(1) DEFAULT 1,
    online character varying(5) DEFAULT 1
);
    DROP TABLE public."user";
       public         heap    postgres    false    3            �            1259    16556    user_id_seq    SEQUENCE     �   CREATE SEQUENCE public.user_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.user_id_seq;
       public          postgres    false    3    201            �           0    0    user_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.user_id_seq OWNED BY public."user".id;
          public          postgres    false    200            .           2604    16561    user id    DEFAULT     d   ALTER TABLE ONLY public."user" ALTER COLUMN id SET DEFAULT nextval('public.user_id_seq'::regclass);
 8   ALTER TABLE public."user" ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    200    201    201            �          0    16558    user 
   TABLE DATA           q   COPY public."user" (id, name, email, password, mobno, apellido, username, isactive, isadmin, online) FROM stdin;
    public          postgres    false    201            �           0    0    user_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.user_id_seq', 30, true);
          public          postgres    false    200            3           2606    16566    user id 
   CONSTRAINT     G   ALTER TABLE ONLY public."user"
    ADD CONSTRAINT id PRIMARY KEY (id);
 3   ALTER TABLE ONLY public."user" DROP CONSTRAINT id;
       public            postgres    false    201            �   O  x���=k1�gݏ)����dB�v�e���,��u�ܩ���׋K���a��-��x�ŋ���Z�����b����F� m��!*8��|�ar@��y��7#lHV)� �E��쪷���l�����4��1�Ҷ�����ėq�m`�
b6�<V�Y���z����F�p�|�FO�@���������d�.T$ZG�������%�a��d���OǞ�l�����y�\w2/K�WpU��Ny�)'����ے�E �����	hTzR�fd�Xj��!�I�����P���9XQ��ޤV��e��?���~�����ʰ߲�6���0�8��     