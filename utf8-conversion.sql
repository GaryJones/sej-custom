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

update wp_posts set post_content = replace(post_content,'â€™','\'');
update wp_posts set post_title = replace(post_title,'â€™','\'');
update wp_comments set comment_content = replace(comment_content,'â€™','\'');
update wp_postmeta set meta_value = replace(meta_value,'â€™','\'');

update wp_posts set post_content = replace(post_content,'â€¦','...');
update wp_posts set post_title = replace(post_title,'â€¦','...');
update wp_comments set comment_content = replace(comment_content,'â€¦','...');
update wp_postmeta set meta_value = replace(meta_value,'â€¦','...');

update wp_posts set post_content = replace(post_content,'â€“','-');
update wp_posts set post_title = replace(post_title,'â€“','-');
update wp_comments set comment_content = replace(comment_content,'â€“','-');
update wp_postmeta set meta_value = replace(meta_value,'â€“','-');

update wp_posts set post_content = replace(post_content,'â€œ','"');
update wp_posts set post_title = replace(post_title,'â€œ','"');
update wp_comments set comment_content = replace(comment_content,'â€œ','"');
update wp_postmeta set meta_value = replace(meta_value,'â€œ','"');

update wp_posts set post_content = replace(post_content,'â€˜','\'');
update wp_posts set post_title = replace(post_title,'â€˜','\'');
update wp_comments set comment_content = replace(comment_content,'â€˜','\'');
update wp_postmeta set meta_value = replace(meta_value,'â€˜','\'');

update wp_posts set post_content = replace(post_content,'â€¢','-');
update wp_posts set post_title = replace(post_title,'â€¢','-');
update wp_comments set comment_content = replace(comment_content,'â€¢','-');
update wp_postmeta set meta_value = replace(meta_value,'â€¢','-');

update wp_posts set post_content = replace(post_content,'â€¡','c');
update wp_posts set post_title = replace(post_title,'â€¡','c');
update wp_comments set comment_content = replace(comment_content,'â€¡','c');
update wp_postmeta set meta_value = replace(meta_value,'â€¡','c');

update wp_posts set post_content = replace(post_content,'â€','"');
update wp_posts set post_title = replace(post_title,'â€','"');
update wp_comments set comment_content = replace(comment_content,'â€','"');
update wp_postmeta set meta_value = replace(meta_value,'â€','"');

update wp_posts set post_content = replace(post_content,'Â','');
update wp_posts set post_title = replace(post_title,'Â','');
update wp_comments set comment_content = replace(comment_content,'Â','');
update wp_postmeta set meta_value = replace(meta_value,'Â','');