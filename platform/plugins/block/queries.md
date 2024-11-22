# Add Files


alter table blocks
add column lang_meta_code varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL;
