# Change the table encodings and collations
ALTER TABLE wp_commentmeta        CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE wp_comments           CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE wp_links              CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE wp_options            CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE wp_postmeta           CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE wp_posts              CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE wp_term_relationships CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE wp_term_taxonomy      CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE wp_terms              CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE wp_usermeta           CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE wp_users              CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;


# Referencing: https://gist.github.com/1379880

