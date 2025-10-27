# CutlerTech Business Website

This is the Laravel project source code for the CutlerTech website.

## Screenshots

### Home Screen

![Home Screen](Home.png)

### About Screen

![About Screen](About.png)

### Skills Screen

![Skills Screen](Skills.png)

### Requests Screen

![Requests Screen](Requests.png)

### Projects Screen

![Projects Screen](Projects.png)

### Pricing Screen

![Pricing Screen](Pricing.png)

## Database Design

### Requests

- ID: bigint unsigned and primary key
- Name: varchar(255)
- Goal: text
- Email: varchar(255)
- Company Name (company_name): varchar(255)
- Website: varchar(255)
- Employees: int
- Location: varchar(255)
- Phone: varchar(255)
- Challenge: text
- Comments: text
- Status: enum('pending','in_progress','completed','cancelled')
- Created At (created_at): timestamp
- Updated At (updated_at): timestamp

### Notifications

- ID: char(36) and primary key
- Type: varchar(255)
- Notifiable Type (notifiable_type): varchar(255) and composite
- Notifiable ID (notifiable_id): bigint unsigned
- Data: text
- Read At (read_at): timestamp
- Created At (created_at): timestamp
- Updated At (updated_at): timestamp

### Users

- ID: bigint unsigned and primary key
- Name: varchar(255)
- Email: varchar(255) and unique
- Email Verified At (email_verified_at): timestamp
- Password: varchar(255)
- Remember Token (remember_token) varchar(100)
- Is Admin (is_admin) tinyint(1)
- Created At (created_at): timestamp
- Updated At (updated_at): timestamp

## RESTful Endpoints

| Name                                    | Method | Path                                    | Middleware | Route Name                  | Controller/Action                          |
| --------------------------------------- | ------ | --------------------------------------- | ---------- | --------------------------- | ------------------------------------------ |
| Retrieve home page                      | GET    | /                                       | N/A        | home                        | N/A                                        |
| Retrieve about page                     | GET    | /about                                  | N/A        | about                       | N/A                                        |
| Retrieve skills page                    | GET    | /skills                                 | N/A        | skills                      | N/A                                        |
| Retrieve projects page                  | GET    | /projects                               | N/A        | projects                    | N/A                                        |
| Retrieve pricing page                   | GET    | /pricing                                | N/A        | pricing                     | N/A                                        |
| Retrieve requests page                  | GET    | /requests                               | N/A        | requests.create             | RequestController - create                 |
| Create request member                   | POST   | /requests                               | N/A        | requests.store              | RequestController - store                  |
| Retrieve login page                     | GET    | /login                                  | N/A        | login                       | AuthController - showLogin                 |
| Create user session                     | POST   | /login                                  | N/A        | login.post                  | AuthController - login                     |
| Retrieve register page                  | GET    | /register                               | N/A        | register                    | AuthController - showRegister              |
| Create user member                      | POST   | /register                               | N/A        | register.post               | AuthController - register                  |
| Delete user session                     | POST   | /logout                                 | N/A        | logout                      | AuthController - logout                    |
| Retrieve dashboard page                 | GET    | /dashboard                              | Auth       | dashboard                   | DashboardController - index                |
| Retrieve requests collection            | GET    | /admin/requests                         | Auth       | requests.index              | RequestController - index                  |
| Retrieve request member                 | GET    | /admin/requests/{request}               | Auth       | requests.show               | RequestController - show                   |
| Delete request member                   | DELETE | /admin/requests/{request}               | Auth       | requests.destroy            | RequestController - destroy                |
| Update request member status            | PATCH  | /admin/requests/{request}/status        | Auth       | requests.updateStatus       | RequestController - updateStatus           |
| Retrieve notifications collection       | GET    | /notifications                          | Auth       | notifications.index         | RequestController - notifications          |
| Update notification member as read      | GET    | /notifications/{notification}/mark-read | Auth       | notifications.mark-read     | RequestController - markAsRead             |
| Update all notification members as read | GET    | /notifications/mark-all-read            | Auth       | notifications.mark-all-read | RequestController - markAllAsRead          |
| Delete notification member              | DELETE | /notifications/{notification}           | Auth       | notifications.delete        | RequestController - deleteNotification     |
| Delete all notification members         | DELETE | /notifications                          | Auth       | notifications.delete-all    | RequestController - deleteAllNotifications |