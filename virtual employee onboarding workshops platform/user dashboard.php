<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        /* CSS Styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('images/image.webp');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .sidebar {
            width: 250px;
            background: #333;
            color: #fff;
            height: 100%;
            position: fixed;
            overflow-y: auto;
        }

        .sidebar h2 {
            text-align: center;
            margin: 20px 0;
            color: #fff;
        }

        .sidebar ul {
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            display: block;
            padding: 10px;
            color: #fff;
            text-decoration: none;
            transition: background 0.3s;
        }

        .sidebar ul li a:hover {
            background: #555;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            color: #333;
        }

        .content h2 {
            margin-bottom: 20px;
            color: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
            color: #333;
        }

        button {
            padding: 8px 12px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .logout-button {
            background-color: #dc3545;
            margin-top: 20px;
        }

        .logout-button:hover {
            background-color: #c82333;
        }

        @media only screen and (max-width: 600px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>User Dashboard</h2>
        <ul>
            <li><a href="announcement.php" onclick="loadTable('announcements')">Announcements</a></li>
            <li><a href="employee.php" onclick="loadTable('employees')">Employees</a></li>
            <li><a href="onboarding r.php" onclick="loadTable('onboardingResources')">Onboarding Resources</a></li>
            <li><a href="onboarding sessions.php" onclick="loadTable('onboardingSessions')">Onboarding Sessions</a></li>
            <li><a href="organizers.php" onclick="loadTable('organizers')">Organizers</a></li>
            <li><a href="process_form.php" onclick="loadTable('documents')">Documents</a></li>
            <li><a href="roles.php" onclick="loadTable('roles')">Roles</a></li>
            <li><a href="users register.php" onclick="loadTable('users')">Users</a></li>
            <li><a href="submit_attendance.php" onclick="loadTable('attendance')">Attendance</a></li>
        </ul>
        <button class="logout-button" onclick="logout()">Log Out</button>
    </div>
    <div class="content">
        <h2 id="table-title">Welcome</h2>
        <table id="data-table">
            <thead id="table-head"></thead>
            <tbody id="table-body"></tbody>
        </table>
    </div>
    <script>
        // JavaScript for Dynamic Content
        async function loadTable(tableName) {
            // Simulated data fetching. Replace with actual API calls.
            const data = await fetchData(tableName);

            document.getElementById('table-title').innerText = tableName.charAt(0).toUpperCase() + tableName.slice(1);

            const tableHead = document.getElementById('table-head');
            const tableBody = document.getElementById('table-body');

            tableHead.innerHTML = '';
            tableBody.innerHTML = '';

            if (data.length > 0) {
                const columns = Object.keys(data[0]);

                let headerRow = '<tr>';
                columns.forEach(column => {
                    headerRow += `<th>${column}</th>`;
                });
                headerRow += '</tr>';
                tableHead.innerHTML = headerRow;

                data.forEach(row => {
                    let bodyRow = '<tr>';
                    columns.forEach(column => {
                        bodyRow += `<td>${row[column]}</td>`;
                    });
                    bodyRow += '</tr>';
                    tableBody.innerHTML += bodyRow;
                });
            } else {
                tableBody.innerHTML = '<tr><td colspan="100%">No data available</td></tr>';
            }
        }

        async function fetchData(tableName) {
            // Simulated data for demonstration purposes
            const simulatedData = {
                announcements: [
                    { id: 1, title: 'Announcement 1', content: 'Content 1' },
                    { id: 2, title: 'Announcement 2', content: 'Content 2' },
                ],
                employees: [
                    { id: 1, name: 'John Doe', position: 'Developer' },
                    { id: 2, name: 'Jane Smith', position: 'Designer' },
                ],
                onboardingResources: [
                    { id: 1, name: 'Resource 1', link: 'Link 1' },
                    { id: 2, name: 'Resource 2', link: 'Link 2' },
                ],
                onboardingSessions: [
                    { id: 1, date: '2024-05-01', time: '09:00', location: 'Room A' },
                ],
                organizers: [
                    { id: 1, name: 'Organizer 1', location: 'Location 1' },
                    { id: 2, name: 'Organizer 2', location: 'Location 2' },
                ],
                documents: [
                    { id: 1, name: 'Document 1', type: 'Type 1' },
                    { id: 2, name: 'Document 2', type: 'Type 2' },
                ],
                roles: [
                    { id: 1, name: 'Role 1', description: 'Description 1' },
                    { id: 2, name: 'Role 2', description: 'Description 2' },
                ],
                users: [
                    { id: 1, username: 'user1', email: 'user1@example.com' },
                    { id: 2, username: 'user2', email: 'user2@example.com' },
                ],
                attendance: [
                    { id: 1, date: '2024-05-01', time: '09:00', status: 'Present' },
                    { id: 2, date: '2024-05-02', time: '09:00', status: 'Absent' },
                ],
            };
            return simulatedData[tableName] || [];
        }

        function logout() {
            window.location.href = 'home.php';  // Replace 'logout.php' with the actual logout URL if different
        }

        // Initial load
        loadTable('announcements');
    </script>
</body>
</html>
