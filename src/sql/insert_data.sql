INSERT INTO products (type, name, price, image_url) VALUES ('keyboard', 'Keychron K2', 130.00, 'https://cdn4.425degree.com/media/amasty/webp/wysiwyg/2020/07/Saekiinyourarea/Keychron-K2-Red-Switch_jpg.webp');
INSERT INTO products (type, name, price, image_url) VALUES ('switches', 'Outemu Red Switches', 10.99, 'https://m.media-amazon.com/images/I/61nHU9yEw+L.jpg');
INSERT INTO products (type, name, price, image_url) VALUES ('switches', 'Outemu Blue Switches', 10.99, 'https://m.media-amazon.com/images/I/5140PF1iAFS.jpg');
INSERT INTO products (type, name, price, image_url) VALUES ('keycaps', 'Cyberpunk Theme PBT Keycaps', 34.50, 'https://i0.wp.com/pandasetup.com/wp-content/uploads/2022/10/mainimage0Teclas-PBT-de-perfil-OEM-para-teclado-mec-nico-Cherry-MX-117-teclas.jpg?resize=400%2C400&ssl=1');

INSERT INTO keyboards (product_id, size, layout, rgb, wireless, hot_swappable) VALUES (1, '75', 'ANSI', true, true, true);
INSERT INTO switches (product_id, type, actuation, bottom_out, `force`) VALUES (2, 'linear', 45, 60, 50);
INSERT INTO switches (product_id, type, actuation, bottom_out, `force`) VALUES (3, 'clicky', 60, 80, 50);
INSERT INTO keycaps (product_id, type) VALUES (4, 'classic');