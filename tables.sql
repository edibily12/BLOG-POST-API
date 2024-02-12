-- Create categories table
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL
);

-- Create posts table
CREATE TABLE posts (
   id INT AUTO_INCREMENT PRIMARY KEY,
   category_id INT,
   title VARCHAR(255) NOT NULL,
   author VARCHAR(255) NOT NULL,
   body TEXT NOT NULL,
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   deleted_at TIMESTAMP NULL,
   CONSTRAINT fk_category
       FOREIGN KEY (category_id)
       REFERENCES categories(id)
       ON DELETE CASCADE
);

-- Soft delete trigger for categories table
CREATE TRIGGER trg_categories_soft_delete
    BEFORE DELETE ON categories
    FOR EACH ROW
BEGIN
    UPDATE categories
    SET deleted_at = NOW()
    WHERE id = OLD.id
END;

-- Soft delete trigger for posts table
CREATE TRIGGER trg_posts_soft_delete
    BEFORE DELETE ON posts
    FOR EACH ROW
BEGIN
    UPDATE posts
    SET deleted_at = NOW()
    WHERE id = OLD.id;
END;

-- Entity integrity constraint for categories table
ALTER TABLE categories
    ADD CONSTRAINT uc_categories_name UNIQUE (name);

-- Entity integrity constraint for Posts table
ALTER TABLE posts
    ADD CONSTRAINT uc_posts_title_author UNIQUE (title);
