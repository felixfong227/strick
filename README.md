# Strick

## A really simple image storage system

## Set up
Run the `env.php` file

### RESTful API

Upload an image(Access token require)
```
HTTP 1.1
POST /api/upload.php
Content-Type: multipart/form-data
Status-Code: 201
Body:
image=(an image binary)
```

Success
```
Content-Type: application/json
Body:
{
    "ID": "<ID>",
    "file_name": "<ID>.<extension>",
    "url": "http://<URL>.com/view.php?file=<ID>.<extension>",
}
```

Failure
```
Content-Type: application/json
Status-Code: 403
Body:
{
    "error": "<Error message>"
}
```

---

Delete an image(Access token require)
```
HTTP 1.1
POST /api/delete.php
Content-Type: multipart/form-data
Status-Code: 201
Body:
filename=<ID>.<extension>
```

Success
```
Content-Type: application/json
Body:
{
    "success": true
}
```

Failure
```
Content-Type: application/json
Status-Code: 403
Body:
{
    "error": "<Error message>"
}
```

---

Viewing an image
```
HTTP 1.1
GET /view.php
Qurey-String: file
Status-Code: 200
```

Success
```
Content-Type: application/json
Body: an image binary
```

Failure
```
Content-Type: application/json
Status-Code: 403
Body:
{
    "error": "<Error message>"
}
```