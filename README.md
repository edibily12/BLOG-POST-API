# Blog Post API

This API provides endpoints to manage blog posts. It allows users to perform CRUD (Create, Read, Update, Delete) operations on blog posts.

## Features:

1. Create: Users can create new blog posts by providing relevant details such as title, content, and any associated metadata.

2. Read: Users can retrieve blog posts by their unique identifiers or other criteria. Additionally, it supports listing all blog posts or paginated results.

3. Update: Users can modify existing blog posts by updating their content, title, or metadata.

4. Delete: Soft delete functionality is implemented, allowing users to mark blog posts as deleted without permanently removing them from the database. This ensures data integrity and history preservation.

5. Retrieve Active Posts: An endpoint is available to retrieve only active blog posts, excluding those that have been soft deleted.
6. Retrieve trashed Posts: An endpoint is available to retrieve only trashed blog posts.

## Technologies Used:

+ Programming Language: PHP
+ Database: MySQL
+ Framework: Custom implementation (No specific framework used)
+ API Interaction: HTTP Requests (GET, POST, PUT, DELETE)
## Usage:

+ Developers can integrate this API into their web applications or services to manage blog posts efficiently.
+ Documentation detailing the endpoints, request formats, and response structures should be provided for easy integration and usage.
## GitHub Repository:

https://github.com/edibily12/BLOG-POST-API/tree/master

Feel free to explore the codebase, contribute, or use it in your projects.