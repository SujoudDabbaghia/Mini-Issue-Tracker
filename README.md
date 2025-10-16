# Mini Issue Tracker - IssueFlow

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

## Project Overview

**Mini Issue Tracker** (IssueFlow) is a lightweight system for tracking issues and tasks in software projects.  
It is built with **Laravel 11** and **MySQL**, and demonstrates advanced **Eloquent ORM** features including:

- Model relationships (One-to-Many, Many-to-Many)
- Accessors & Mutators
- Custom Casts
- Local Scopes
- Transactions
- Advanced queries using `withCount` and `whereRelation`

This project focuses on practical implementation of database relationships and provides a flexible structure for project teams to manage tasks, issues, labels, and comments efficiently.

---

## Entities

| Entity | Description |
|--------|------------|
| **Project** | A container for multiple issues |
| **User** | Team member (reporter, assignee, commenter) |
| **Issue** | Task card within a project, including status, priority, and a short code |
| **Comment** | Comments associated with an Issue and a User |
| **Label** | Tags that can be assigned to Issues |

**Relationships**:  
- Project → hasMany Issues  
- Issue → belongsTo Project, belongsTo Reporter(User), belongsTo Assignee(User), hasMany Comments, belongsToMany Labels  
- Comment → belongsTo Issue, belongsTo User  
- Label → belongsToMany Issues  

---

## Features

- **Dynamic CRUD operations** for Projects, Issues, Comments, and Labels  
- **Mutators & Accessors** to format Issue codes and titles automatically  
- **Custom Cast** for handling `due_window` as a JSON object in PHP  
- **Local Scopes** for filtering open or urgent issues easily  
- **Transactions** when creating new Issues with labels and initial comments  
- **Advanced Queries** with `withCount` for comments and `whereRelation` for filtered issues  
- **Blade templates** for simple, responsive user interfaces  

---

## Installation

1. Clone the repository:  
```bash
git clone <your-repo-url>
