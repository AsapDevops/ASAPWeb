<x-app-layout>
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <style>
        #contacts-list {
            overflow-y: auto;
            width: 300px;
            height: 500px;
            background-color: #ECECEC;
            border-radius: 0.75rem;
            border: 1px solid #D4D4D4;
            font-family: 'Inter';
        }

        #contacts-list h2 {
            padding: 20px;
        }

        .contact-container {
            height: 50px;
            display: flex;
            padding: 5px 0;
            cursor: pointer;
            border-bottom: 1px solid #D4D4D4;
        }

        .contact-container:hover {
            background-color: #007DF9;
            color: #fff;
            font-weight: bold;
        }

        .contact-name {
            padding: 0 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        .unread-badge {
            background-color: #FF3B30;
            color: white;
            border-radius: 10px;
            padding: 2px 8px;
            font-size: 0.8rem;
            margin-left: auto;
            display: inline-block;
            vertical-align: middle;
        }
    </style>

    </head>

    <body>

        <script>
            (function(t, a, l, k, j, s) {
                s = a.createElement('script');
                s.async = 1;
                s.src = "https://cdn.talkjs.com/talk.js";
                a.head.appendChild(s);
                k = t.Promise;
                t.Talk = {
                    v: 3,
                    ready: {
                        then: function(f) {
                            if (k) return new k(function(r, e) {
                                l.push([f, r, e])
                            });
                            l
                                .push([f])
                        },
                        catch: function() {
                            return k && new k()
                        },
                        c: l
                    }
                };
            })(window, document, []);
        </script>


        <div style="display: flex; justify-content: center; align-items: center;">

            <!-- container element in which TalkJS will display a chat UI -->
            <div id="talkjs-container" style="width: 40%; margin: 30px; height: 500px;">
                <i>Loading chat...</i>
            </div>
            <div id="contacts-list">
                <h2>Chat</h2>
            </div>

        </div>


        <script type="text/javascript">
            const otherUsers = @json($users);
            const contactsWrapper = document.getElementById('contacts-list');
            for (let user of otherUsers) {
                const id = user.id;
                const username = user.name;

                const usernameDiv = document.createElement('div');
                usernameDiv.classList.add('contact-name');
                usernameDiv.innerText = username;

                // Create badge for unread count
                const badge = document.createElement('span');
                badge.classList.add('unread-badge');
                badge.style.display = 'none'; // Hide by default
                badge.innerText = '0';

                const contactContainerDiv = document.createElement('div');
                contactContainerDiv.classList.add('contact-container');
                contactContainerDiv.appendChild(usernameDiv);
                contactContainerDiv.appendChild(badge); // Add badge to contact

                contactsWrapper.appendChild(contactContainerDiv);
            }
            const currentUser = @json(auth()->user());
            Talk.ready.then(function() {
                let me = new Talk.User({
                    id: currentUser.id,
                    name: currentUser.name,
                });
                window.talkSession = new Talk.Session({
                    appId: 't3C1VJQJ',
                    me: me,
                });
                const chatbox = talkSession.createChatbox();
                chatbox.mount(document.getElementById('talkjs-container'));
                const conversations = otherUsers.map(function(user, index) {
                    const otherUser = new Talk.User(user);
                    conversation = talkSession.getOrCreateConversation(Talk.oneOnOneId(me, otherUser));
                    conversation.setParticipant(me);
                    conversation.setParticipant(otherUser);
                    return conversation;
                });
                let contactsListDivs = document.getElementsByClassName('contact-container');
                conversations.forEach(function(conversation, index) {
                    contactsListDivs[index].addEventListener('click', function() {
                        chatbox.select(conversation);
                    });
                });
            });
        </script>
</x-app-layout>