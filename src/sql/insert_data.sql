INSERT INTO products (type, name, price, image_url)
VALUES
    ('keycaps', 'Azerty sakura keycaps', 130, 'https://yunk.fr/cdn/shop/products/Sd67c8e67d8bd4b0a8db331419574739eZ_360x.jpg?v=1654785499'),
    ('keycaps', 'Qwerty deathnote kaycaps', 75, 'https://keycaps-industries.fr/cdn/shop/products/keycaps-death-note_480x.jpg?v=1645049006'),
    ('keycaps', 'Qwerty black sea keycaps', 130, 'https://qwertykey.ro/cdn/shop/products/Set_Taste_QwertyKey_Black_Sea_OEM_PBT_Double_Shot.webp?v=1672844115&width=1100'),
    ('keyboard', 'Razer pro type ultra', 215, 'https://assets3.razerzone.com/4uylDU-j_BFa_WE8miGwM0mG5kM=/1199x799/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh87%2Fh97%2F9311020974110%2F220117-pro-type-ultra-1500x1000-5.jpg'),
    ('accessory', 'Razer pro glide XXL', 45, 'https://assets3.razerzone.com/0QwTY_dzn77TfkpgLnwiRaq-3eA=/1199x799/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh64%2Fh8d%2F9269596061726%2F211102-pro-glide-xxl-1500x1000-v2-1.jpg'),
    ('accessory', 'Razer ergonomic wrist rest for mini keyboards', 30, 'https://assets3.razerzone.com/Xf01LVHJc2xAeV3DqZv8DR0_fQM=/1199x799/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fha0%2Fh28%2F9189306531870%2FErgonomic-Wrist-Rest-Mini-1500x1000-03.jpg'),
    ('keyboard', 'Vortex Core Aluminum 40% RGB Dye Sub PBT Mechanical Keyboard', 100, 'https://mechanicalkeyboards.com/shop/images/products/large_VTG47BEGRURS_main.jpg'),
    ('keyboard', 'Keychron K2', 130.00, 'https://cdn4.425degree.com/media/amasty/webp/wysiwyg/2020/07/Saekiinyourarea/Keychron-K2-Red-Switch_jpg.webp'),
    ('switches', 'Outemu Red Switches', 10.99, 'https://m.media-amazon.com/images/I/61nHU9yEw+L.jpg'),
    ('switches', 'Outemu Blue Switches', 10.99, 'https://m.media-amazon.com/images/I/5140PF1iAFS.jpg'),
    ('keycaps', 'Cyberpunk Theme PBT Keycaps', 34.50, 'https://i0.wp.com/pandasetup.com/wp-content/uploads/2022/10/mainimage0Teclas-PBT-de-perfil-OEM-para-teclado-mec-nico-Cherry-MX-117-teclas.jpg?resize=400%2C400&ssl=1'),
    ('tool', 'Mechanical Keyboard Switch Puller', 3.20, 'https://cdn11.bigcommerce.com/s-up92fzossx/images/stencil/1280x1280/products/262/679/Key_Switch_Puller_1__35605.1622282423.jpg?c=1');

INSERT INTO keycaps (product_id, type)
VALUES
    (1, 'classic'),
    (2, 'classic'),
    (3, 'classic'),
    (11, 'classic');

INSERT INTO keyboards (product_id, type, layout, rgb, wireless, hot_swappable)
VALUES
    (4, 'full', 'ISO', false, true, false),
    (7, 'other', 'ANSI', true, false, false),
    (8, '75', 'ANSI', true, true, true);

INSERT INTO accessories (product_id, type)
VALUES
    (5, 'mouse_pad'),
    (6, 'wrist_rest');

INSERT INTO switches (product_id, type, actuation, bottom_out, `force`)
VALUES
    (9, 'linear', 45, 60, 50),
    (10, 'clicky', 60, 80, 50);

INSERT INTO tools (product_id, type)
VALUES
    (12, 'switch_puller');
