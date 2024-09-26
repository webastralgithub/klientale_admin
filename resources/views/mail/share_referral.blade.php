<!DOCTYPE html>
<html>

<head>
    <title>Share Referral Email</title>
</head>

<body>
    <h2>Share Referral</h2>

    <p>
        Hello {{ @$sendTo->firstname }},
    </p>

    <p>
        You have received a referral from {{ @$sendTo->firstname }}. Here are the details:
    </p>

    <ul>
        @foreach($selectedContacts as $selectedContact)
        <li>
            <strong>Name:</strong> {{ @$selectedContact->firstname }}
            <br>
            <strong>Email:</strong> {{ @$selectedContact->email }}
            <br>
            <strong>Address:</strong> {{ @$selectedContact->address1 }}
            <br>
            <strong>Service Require:</strong> {{ @$selectedContact->servceRequire }}
            <br>
            <strong>Category:</strong> {{ @$selectedContact->categoryName->name }}
            <br>
        </li>
        @endforeach
    </ul>

    <p>
        Thank you for using our referral system.
    </p>

    <p>
        Regards,
        <br>
        Klientale
    </p>
</body>

</html>