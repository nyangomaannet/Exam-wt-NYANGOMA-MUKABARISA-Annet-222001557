<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* CSS Styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
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
        }

        .content h2 {
            margin-bottom: 20px;
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
        <h2>Admin Dashboard</h2>
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
                headerRow += '<th>Actions</th></tr>';
                tableHead.innerHTML = headerRow;

                data.forEach(row => {
                    let bodyRow = '<tr>';
                    columns.forEach(column => {
                        bodyRow += `<td>${row[column]}</td>`;
                    });
                    bodyRow += `<td>
                        <button onclick="editRow('${tableName}', ${row.id})">Edit</button>
                        <button onclick="deleteRow('${tableName}', ${row.id})">Delete</button>
                    </td></tr>`;
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
                // Add other table data simulations as needed
            };
            return simulatedData[tableName] || [];
        }

        function editRow(tableName, id) {
            alert(`Edit ${tableName} with ID ${id}`);
            // Implement edit functionality
        }

        function deleteRow(tableName, id) {
            alert(`Delete ${tableName} with ID ${id}`);
            // Implement delete functionality
        }

        // Initial load
        loadTable('announcements');
    </script>
</body>
</html>
