@extends("layouts.head")

@section("main-content")

<div class="drawer lg:drawer-open h-screen">
    <input id="sidebar-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col h-screen">
        <!-- Chat Area -->
        <div class="flex flex-col h-full">
            <!-- Top navigation for mobile -->
            <div class="navbar bg-base-100 shadow-sm lg:hidden">
                <div class="flex-none">
                    <label for="sidebar-drawer" class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </label>
                </div>
                <div class="flex-1">
                    <h2 id="session-title" class="text-lg font-medium">AI Chat Assistant</h2>
                </div>
                <div id="error-controls" class="flex-none hidden">
                    <button id="retry-btn" class="btn btn-sm btn-ghost">Continue</button>
                    <button id="restart-btn" class="btn btn-sm btn-primary">Restart</button>
                </div>
            </div>
            
            <!-- Chat container -->
            <div class="flex-1 flex flex-col overflow-hidden">
                <!-- Empty state -->
                <div id="empty-state" class="flex-1 flex flex-col items-center justify-center p-4">
                    <div class="card bg-base-100 shadow-xl max-w-md mx-auto w-full">
                        <div class="card-body text-center">
                            <div class="avatar placeholder mx-auto mb-6">
                                <div class="bg-gradient-to-br from-primary to-secondary text-primary-content rounded-full w-24">
                                    <span class="text-3xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <h2 class="card-title justify-center text-2xl font-bold">Welcome to AI Chat Assistant</h2>
                            <p class="text-base-content/70 my-4">Start a new conversation with your AI learning assistant or choose a preset topic below.</p>
                            
                            <!-- Preset Topics -->
                            <div class="my-4">
                                <h3 class="font-medium text-sm uppercase text-base-content/60 mb-3">Start with a preset</h3>
                                <div class="grid grid-cols-1 gap-2">
                                    <button class="preset-topic btn btn-outline border-base-300 justify-start text-left normal-case font-normal h-auto py-3 hover:bg-base-200">
                                        <div>
                                            <div class="font-medium">Explain complex concepts</div>
                                            <div class="text-xs opacity-70">Get clear explanations of difficult topics</div>
                                        </div>
                                    </button>
                                    <button class="preset-topic btn btn-outline border-base-300 justify-start text-left normal-case font-normal h-auto py-3 hover:bg-base-200">
                                        <div>
                                            <div class="font-medium">Help with problem solving</div>
                                            <div class="text-xs opacity-70">Get step-by-step guidance for exercises</div>
                                        </div>
                                    </button>
                                    <button class="preset-topic btn btn-outline border-base-300 justify-start text-left normal-case font-normal h-auto py-3 hover:bg-base-200">
                                        <div>
                                            <div class="font-medium">Quiz me on a topic</div>
                                            <div class="text-xs opacity-70">Test your knowledge with interactive quizzes</div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="card-actions justify-center mt-2">
                                <button id="mobile-new-chat-btn" class="btn btn-primary btn-wide">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                    Start a New Chat
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Chat messages area -->
                <div id="chat-container" class="hidden flex flex-col h-full">
                    <!-- Top bar with session info (desktop version) -->
                    <div class="bg-base-100 border-b border-base-200 p-4 hidden lg:flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="avatar placeholder mr-3">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-secondary to-primary text-primary-content flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9.504 1.132a1 1 0 01.992 0l1.75 1a1 1 0 11-.992 1.736L10 3.152l-1.254.716a1 1 0 11-.992-1.736l1.75-1z" clip-rule="evenodd" />
                                        <path d="M5.618 4.504a1 1 0 01-.372 1.364L5.016 6l.23.132a1 1 0 11-.992 1.736L4 7.723V8a1 1 0 01-2 0V6a.996.996 0 01.52-.878l1.734-.99a1 1 0 011.364.372zm8.764 0a1 1 0 011.364-.372l1.733.99A1.002 1.002 0 0118 6v2a1 1 0 11-2 0v-.277l-.254.145a1 1 0 11-.992-1.736l.23-.132-.23-.132a1 1 0 01-.372-1.364z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h2 id="desktop-session-title" class="font-medium text-lg">AI Chat Assistant</h2>
                                <p class="text-xs text-base-content/60">Ask any questions about your subject</p>
                            </div>
                        </div>
                        <div>
                          
                            <button id="desktop-share-btn" class="btn btn-sm btn-ghost">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                </svg>
                                Share
                            </button>
                        </div>
                    </div>

                    <!-- Message list -->
                    <div id="messages-container" class="flex-1 overflow-y-auto space-y-6 py-8 px-4 md:px-8 lg:px-16 xl:px-32 bg-base-200"></div>
                    
                    <!-- Error banner -->
                    <div id="error-banner" class="hidden bg-error/10 p-4 border-t border-error/20">
                        <div class="flex max-w-3xl mx-auto">
                            <div class="flex-shrink-0 text-error">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-error">Something went wrong with the AI response</h3>
                                <div class="mt-1 text-sm text-error/70">
                                    <p id="error-message">Please try again or restart the conversation.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Input area - fixed at bottom -->
                    <div class="bg-base-100 border-t border-base-300 sticky bottom-0">
                        <form id="message-form" class="max-w-3xl mx-auto p-4">
                            <div class="flex flex-col gap-2">
                                <div class="relative">
                                    <textarea
                                        id="message-input"
                                        class="textarea textarea-bordered w-full pr-24 resize-none min-h-[3.5rem] rounded-xl"
                                        placeholder="Type your message here..."
                                        rows="2"
                                    ></textarea>
                                    <div class="absolute right-2 bottom-2 flex gap-1">
                                        <button
                                            type="button"
                                            id="attach-btn"
                                            class="btn btn-sm btn-ghost btn-circle"
                                            title="Attach file"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"
                                                />
                                            </svg>
                                        </button>
                                        <button type="submit" class="btn btn-sm btn-primary rounded-lg px-3">
                                            <span class="mr-1">Send</span>
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-4 w-4"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"
                                                />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="text-xs text-base-content/60 text-center">
                                    AI responses are generated based on the latest available data and may not always be accurate.
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Sidebar -->
    <div class="drawer-side">
        <label for="sidebar-drawer" class="drawer-overlay"></label>
        <div class="bg-base-100 w-80 h-full flex flex-col">
            <div class="p-4 flex flex-col h-full">
                <!-- New chat button -->
                <div class="mb-4 relative">
                    <button class="btn btn-primary w-full rounded-lg" id="new-chat-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        <span>New Chat</span>
                    </button>
                    <div id="subject-dropdown" class="absolute top-full left-0 right-0 mt-1 z-50 menu p-2 shadow-lg bg-base-100 rounded-box w-full hidden">
                        <div class="p-2 text-sm font-medium text-base-content/70 border-b border-base-300">
                            Select a subject
                        </div>
                        <ul class="menu menu-sm">
                            @foreach ($subjects as $subject)
                                <li class="subject-item" data-id="{{ $subject->id }}">
                                    <a>{{ $subject->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Search conversations -->
                <div class="mb-4">
                    <div class="relative">
                        <input type="text" placeholder="Search conversations" class="input input-bordered w-full pl-10 input-sm" />
                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-base-content/60">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
                
                <!-- Recent conversations -->
                <div class="flex-none">
                    <h3 class="font-medium text-xs text-base-content/50 uppercase tracking-wider mb-2 px-2">
                        Recent Conversations
                    </h3>
                </div>
                
                <!-- Session list -->
                <div class="flex-1 overflow-y-auto">
                    <ul class="menu menu-sm w-full">
                        @foreach ($sessions as $session)
                            <li class="session-item hover:bg-base-200 rounded-lg mb-1" data-id="{{ $session->id }}">
                                <a class="flex justify-between group py-3">
                                    <div class="flex flex-col overflow-hidden">
                                        <span class="truncate font-medium">{{ $session->title }}</span>
                                        <span class="text-xs text-base-content/60 truncate">Last active: {{ $session->updated_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="session-actions flex opacity-0 group-hover:opacity-100 transition-opacity duration-200 gap-1 ml-2">
                                        <button class="rename-session btn btn-ghost btn-xs btn-circle" data-id="{{ $session->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                        <button class="delete-session btn btn-ghost btn-xs btn-circle text-error" data-id="{{ $session->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                
                <!-- Footer -->
                <div class="mt-auto pt-4 border-t border-base-300 text-xs text-base-content/50 text-center">
                    <p>{{ config("app.name") }} AI Instruktor © 2025</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Message Templates -->
<template id="user-message-template">
    <div class="chat chat-end message user-message" data-id="{id}">
        <div class="chat-image avatar">
            <div class="w-10 h-10 rounded-full bg-primary text-primary-content flex items-center justify-center">
                @php
                $user = auth()->user();
                $profilePhoto = $user->profile_photo_url ?? null;
                @endphp
                
                @if($profilePhoto)
                <img src="{{ $profilePhoto }}" alt="Profile" class="w-full h-full object-cover rounded-full">
                @else
                <div class="avatar placeholder">
                    <div class="bg-neutral text-neutral-content rounded-full w-10">
                        <span>{{ strtoupper(substr($user->first_name ?? '', 0, 1)) }}{{ strtoupper(substr($user->last_name ?? '', 0, 1)) }}</span>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="chat-bubble chat-bubble-primary message-content rounded-2xl max-w-sm md:max-w-md">{content}</div>
        <div class="chat-footer opacity-75 text-xs flex gap-1 items-center mt-1">
            <button class="edit-message link link-hover">Edit</button>
            <span class="hidden edited-indicator italic">(edited)</span>
        </div>
    </div>
</template>

<template id="ai-message-template">
    <div class="chat chat-start message ai-message" data-id="{id}">
        <div class="chat-image avatar">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-secondary to-primary flex items-center justify-center p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-content" viewBox="0 0 35 35" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.504 1.132a1 1 0 01.992 0l1.75 1a1 1 0 11-.992 1.736L10 3.152l-1.254.716a1 1 0 11-.992-1.736l1.75-1zM5.618 4.504a1 1 0 01-.372 1.364L5.016 6l.23.132a1 1 0 11-.992 1.736L4 7.723V8a1 1 0 01-2 0V6a.996.996 0 01.52-.878l1.734-.99a1 1 0 011.364.372zm8.764 0a1 1 0 011.364-.372l1.733.99A1.002 1.002 0 0118 6v2a1 1 0 11-2 0v-.277l-.254.145a1 1 0 11-.992-1.736l.23-.132-.23-.132a1 1 0 01-.372-1.364zm-7 4a1 1 0 011.364-.372L10 8.848l1.254-.716a1 1 0 11.992 1.736L11 10.58V12a1 1 0 11-2 0v-1.42l-1.246-.712a1 1 0 01-.372-1.364zM3 11a1 1 0 011 1v1.42l1.246.712a1 1 0 11-.992 1.736l-1.75-1A1 1 0 012 14v-2a1 1 0 011-1zm14 0a1 1 0 011 1v2a1 1 0 01-.504.868l-1.75 1a1 1 0 11-.992-1.736L16 13.42V12a1 1 0 011-1zm-9.618 5.504a1 1 0 011.364-.372l.254.146v-.278a1 1 0 112 0v.277l.254-.146a1 1 0 11.992 1.736l-1.735.992a.995.995 0 01-1.022 0l-1.735-.992a1 1 0 01-.372-1.364z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        <div class="chat-bubble chat-bubble-secondary rounded-2xl max-w-sm md:max-w-xl lg:max-w-2xl">
            <div class="message-content prose prose-sm max-w-none">{content}</div>
        </div>
        
    </div>
</template>

<template id="typing-indicator-template">
    <div class="chat chat-start message ai-typing">
        <div class="chat-image avatar">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-secondary to-primary flex items-center justify-center p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-content" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.504 1.132a1 1 0 01.992 0l1.75 1a1 1 0 11-.992 1.736L10 3.152l-1.254.716a1 1 0 11-.992-1.736l1.75-1zM5.618 4.504a1 1 0 01-.372 1.364L5.016 6l.23.132a1 1 0 11-.992 1.736L4 7.723V8a1 1 0 01-2 0V6a.996.996 0 01.52-.878l1.734-.99a1 1 0 011.364.372zm8.764 0a1 1 0 011.364-.372l1.733.99A1.002 1.002 0 0118 6v2a1 1 0 11-2 0v-.277l-.254.145a1 1 0 11-.992-1.736l.23-.132-.23-.132a1 1 0 01-.372-1.364zm-7 4a1 1 0 011.364-.372L10 8.848l1.254-.716a1 1 0 11.992 1.736L11 10.58V12a1 1 0 11-2 0v-1.42l-1.246-.712a1 1 0 01-.372-1.364zM3 11a1 1 0 011 1v1.42l1.246.712a1 1 0 11-.992 1.736l-1.75-1A1 1 0 012 14v-2a1 1 0 011-1zm14 0a1 1 0 011 1v2a1 1 0 01-.504.868l-1.75 1a1 1 0 11-.992-1.736L16 13.42V12a1 1 0 011-1zm-9.618 5.504a1 1 0 011.364-.372l.254.146v-.278a1 1 0 112 0v.277l.254-.146a1 1 0 11.992 1.736l-1.735.992a.995.995 0 01-1.022 0l-1.735-.992a1 1 0 01-.372-1.364z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        <div class="chat-bubble chat-bubble-secondary rounded-2xl min-w-[100px]">
            <div class="flex items-center gap-2">
                <div class="loading loading-dots loading-sm"></div>
                <span class="text-sm opacity-70">Thinking...</span>
            </div>
        </div>
    </div>
</template>

<!-- Loading Conversation Template -->
<template id="loading-conversation-template">
    <div class="flex flex-col gap-8 animate-pulse p-4">
        <div class="chat chat-start">
            <div class="chat-image avatar opacity-50">
                <div class="w-10 h-10 rounded-full bg-base-300"></div>
            </div>
            <div class="chat-bubble bg-base-300 h-24 w-64 md:w-96"></div>
        </div>
        <div class="chat chat-end">
            <div class="chat-image avatar opacity-50">
                <div class="w-10 h-10 rounded-full bg-base-300"></div>
            </div>
            <div class="chat-bubble bg-base-300 h-16 w-48 md:w-64"></div>
        </div>
        <div class="chat chat-start">
            <div class="chat-image avatar opacity-50">
                <div class="w-10 h-10 rounded-full bg-base-300"></div>
            </div>
            <div class="chat-bubble bg-base-300 h-32 w-72 md:w-[32rem]"></div>
        </div>
    </div>
</template>

<!-- Add these to your existing modals section -->
<!-- Modals -->
<dialog id="rename-modal" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Rename Chat Session</h3>
        <div class="py-4">
            <input type="text" id="rename-input" class="input input-bordered w-full" />
            <input type="hidden" id="rename-session-id">
        </div>
        <div class="modal-action">
            <button id="cancel-rename" class="btn">Cancel</button>
            <button id="confirm-rename" class="btn btn-primary">Save</button>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<dialog id="delete-modal" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Delete Chat Session</h3>
        <p class="py-4">Are you sure you want to delete this chat session? This action cannot be undone.</p>
        <input type="hidden" id="delete-session-id">
        <div class="modal-action">
            <button id="cancel-delete" class="btn">Cancel</button>
            <button id="confirm-delete" class="btn btn-error">Delete</button>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<dialog id="edit-modal" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Edit Message</h3>
        <div class="py-4">
            <textarea id="edit-message-input" class="textarea textarea-bordered w-full" rows="4"></textarea>
            <input type="hidden" id="edit-message-id">
        </div>
        <div class="modal-action">
            <button id="cancel-edit" class="btn">Cancel</button>
            <button id="confirm-edit" class="btn btn-primary">Save</button>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<!-- Share conversation modal -->
<dialog id="share-modal" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Share Conversation</h3>
        <div class="py-4">
            <p class="mb-4 text-sm">Share this conversation link with others:</p>
            <div class="flex">
                <input type="text" id="share-url" class="input input-bordered flex-1 rounded-r-none" readonly />
                <button id="copy-url" class="btn btn-primary rounded-l-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="modal-action">
            <button id="close-share" class="btn">Close</button>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>


    <!-- Add KaTeX for rendering math equations -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/katex@0.16.4/dist/katex.min.css"
    />

<script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.4/dist/katex.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.4/dist/contrib/auto-render.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/atom-one-dark.min.css"> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Templates
    const userMessageTemplate = document.getElementById('user-message-template').innerHTML.trim();
    const aiMessageTemplate = document.getElementById('ai-message-template').innerHTML.trim();
    const typingIndicatorTemplate = document.getElementById('typing-indicator-template').innerHTML.trim();
    const loadingConversationTemplate = document.getElementById('loading-conversation-template').innerHTML.trim();

    // Set CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Variables
    let currentSessionId = null;
    const pollingInterval = 2000; // 2 seconds
    let pollingTimer = null;
    let lastMessageTimestamp = null;

    // DOM Elements
    const newChatBtn = document.getElementById('new-chat-btn');
    const mobileNewChatBtn = document.getElementById('mobile-new-chat-btn');
    const subjectDropdown = document.getElementById('subject-dropdown');
    const subjectItems = document.querySelectorAll('.subject-item');
    const presetTopics = document.querySelectorAll('.preset-topic');
    const emptyState = document.getElementById('empty-state');
    const chatContainer = document.getElementById('chat-container');
    const messagesContainer = document.getElementById('messages-container');
    const messageForm = document.getElementById('message-form');
    const messageInput = document.getElementById('message-input');
    const sessionTitle = document.getElementById('session-title');
    const desktopSessionTitle = document.getElementById('desktop-session-title');
    const errorBanner = document.getElementById('error-banner');
    const errorMessage = document.getElementById('error-message');
    const errorControls = document.getElementById('error-controls');
    const retryBtn = document.getElementById('retry-btn');
    const restartBtn = document.getElementById('restart-btn');
    const shareBtn = document.getElementById('desktop-share-btn');
    const attachBtn = document.getElementById('attach-btn');
    
    // Modals
    const renameModal = document.getElementById('rename-modal');
    const deleteModal = document.getElementById('delete-modal');
    const editModal = document.getElementById('edit-modal');
    const shareModal = document.getElementById('share-modal');

    // Configure Marked.js for better Markdown rendering
    marked.setOptions({
        renderer: new marked.Renderer(),
        highlight: function(code, lang) {
            if (lang && hljs.getLanguage(lang)) {
                return hljs.highlight(code, { language: lang }).value;
            }
            return hljs.highlightAuto(code).value;
        },
        pedantic: false,
        gfm: true,
        breaks: true,
        sanitize: false,
        smartypants: false,
        xhtml: false
    });

    // Update both session title displays (mobile & desktop)
    function updateSessionTitles(title) {
        if (sessionTitle) sessionTitle.textContent = title || 'AI Chat Assistant';
        if (desktopSessionTitle) desktopSessionTitle.textContent = title || 'AI Chat Assistant';
    }

    // Show loading animation
    function showLoadingState() {
        // Hide empty state
        emptyState.classList.add('hidden');
        // Show chat container
        chatContainer.classList.remove('hidden');
        // Clear existing messages
        messagesContainer.innerHTML = loadingConversationTemplate;
    }

    // Event Handlers

    // Toggle subject dropdown for new chat
    if (newChatBtn) {
        newChatBtn.addEventListener('click', function() {
            subjectDropdown.classList.toggle('hidden');
        });
    }
    
    // Mobile new chat button
    if (mobileNewChatBtn) {
        mobileNewChatBtn.addEventListener('click', function() {
            // Close mobile drawer if open
            document.getElementById('sidebar-drawer').checked = true;
            // Show subject dropdown
            subjectDropdown.classList.remove('hidden');
        });
    }

    // Hide dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (newChatBtn && !newChatBtn.contains(e.target) && 
            subjectDropdown && !subjectDropdown.contains(e.target)) {
            subjectDropdown.classList.add('hidden');
        }
    });

    // Create new chat session from subject selection
    if (subjectItems) {
        subjectItems.forEach(item => {
            item.addEventListener('click', function() {
                const subjectId = this.dataset.id;
                createSession(subjectId);
                subjectDropdown.classList.add('hidden');
            });
        });
    }

    // Handle preset topic clicks
    if (presetTopics) {
        presetTopics.forEach(topic => {
            topic.addEventListener('click', function() {
                const presetText = this.querySelector('.font-medium').textContent;
                // Get the first subject (or a default one)
                let subjectId = document.querySelector('.subject-item')?.dataset.id || '1';
                
                createSessionWithPreset(subjectId, presetText);
            });
        });
    }

    // Select chat session
    document.addEventListener('click', function(e) {
        const sessionItem = e.target.closest('.session-item');
        if (sessionItem && !e.target.closest('.session-actions')) {
            const sessionId = sessionItem.dataset.id;
            
            // Add loading animation
            showLoadingState();
            
            // Load session with delay to show loading animation
            setTimeout(() => {
                loadSession(sessionId);
            }, 300);
            
            // Update URL without reloading the page
            updateUrlWithSessionId(sessionId);
        }
    });

    // Rename chat session
    document.addEventListener('click', function(e) {
        const renameBtn = e.target.closest('.rename-session');
        if (renameBtn) {
            e.stopPropagation();
            const sessionId = renameBtn.dataset.id;
            const sessionItem = renameBtn.closest('.session-item');
            const title = sessionItem.querySelector('.truncate').textContent.trim();
            
            document.getElementById('rename-session-id').value = sessionId;
            document.getElementById('rename-input').value = title;
            renameModal.showModal();
            
            // Focus the input after a brief delay
            setTimeout(() => {
                document.getElementById('rename-input').focus();
                document.getElementById('rename-input').select();
            }, 100);
        }
    });

    if (document.getElementById('confirm-rename')) {
        document.getElementById('confirm-rename').addEventListener('click', function() {
            const sessionId = document.getElementById('rename-session-id').value;
            const title = document.getElementById('rename-input').value.trim();
            
            if (title) {
                renameSession(sessionId, title);
                renameModal.close();
            }
        });
    }

    if (document.getElementById('cancel-rename')) {
        document.getElementById('cancel-rename').addEventListener('click', function() {
            renameModal.close();
        });
    }

    // Delete chat session
    document.addEventListener('click', function(e) {
        const deleteBtn = e.target.closest('.delete-session');
        if (deleteBtn) {
            e.stopPropagation();
            const sessionId = deleteBtn.dataset.id;
            
            document.getElementById('delete-session-id').value = sessionId;
            deleteModal.showModal();
        }
    });

    if (document.getElementById('confirm-delete')) {
        document.getElementById('confirm-delete').addEventListener('click', function() {
            const sessionId = document.getElementById('delete-session-id').value;
            deleteSession(sessionId);
            deleteModal.close();
        });
    }

    if (document.getElementById('cancel-delete')) {
        document.getElementById('cancel-delete').addEventListener('click', function() {
            deleteModal.close();
        });
    }

    // Share conversation
    if (shareBtn) {
        shareBtn.addEventListener('click', function() {
            if (currentSessionId) {
                const shareUrl = `${window.location.origin}${window.location.pathname}?session=${currentSessionId}`;
                document.getElementById('share-url').value = shareUrl;
                shareModal.showModal();
                
                // Select the URL
                setTimeout(() => {
                    document.getElementById('share-url').select();
                }, 100);
            }
        });
    }

    // Copy share URL
    if (document.getElementById('copy-url')) {
        document.getElementById('copy-url').addEventListener('click', function() {
            const shareUrl = document.getElementById('share-url');
            shareUrl.select();
            document.execCommand('copy');
            
            // Show tooltip or feedback
            this.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>';
            
            setTimeout(() => {
                this.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg>';
            }, 2000);
        });
    }

    if (document.getElementById('close-share')) {
        document.getElementById('close-share').addEventListener('click', function() {
            shareModal.close();
        });
    }

    // Send message
    if (messageForm) {
        messageForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const message = messageInput.value.trim();
            if (message && currentSessionId) {
                sendMessage(currentSessionId, message);
                messageInput.value = '';
                messageInput.style.height = 'auto';
                messageInput.focus();
            }
        });
    }

    // Auto-resize textarea
    if (messageInput) {
        messageInput.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = Math.min(this.scrollHeight, 200) + 'px';
        });
    }

    // Edit message
    document.addEventListener('click', function(e) {
        const editBtn = e.target.closest('.edit-message');
        if (editBtn) {
            const messageEl = editBtn.closest('.message');
            const messageId = messageEl.dataset.id;
            const content = messageEl.querySelector('.message-content').textContent.trim();
            
            document.getElementById('edit-message-id').value = messageId;
            document.getElementById('edit-message-input').value = content;
            editModal.showModal();
            
            // Focus the textarea
            setTimeout(() => {
                document.getElementById('edit-message-input').focus();
            }, 100);
        }
    });

    if (document.getElementById('confirm-edit')) {
        document.getElementById('confirm-edit').addEventListener('click', function() {
            const messageId = document.getElementById('edit-message-id').value;
            const content = document.getElementById('edit-message-input').value.trim();
            
            if (content) {
                editMessage(messageId, content);
                editModal.close();
            }
        });
    }

    if (document.getElementById('cancel-edit')) {
        document.getElementById('cancel-edit').addEventListener('click', function() {
            editModal.close();
        });
    }

    // Retry/restart processing
    if (retryBtn) {
        retryBtn.addEventListener('click', function() {
            retryProcessing(currentSessionId);
        });
    }

    if (restartBtn) {
        restartBtn.addEventListener('click', function() {
            restartProcessing(currentSessionId);
        });
    }


    // Attach button (placeholder for now)
    if (attachBtn) {
        attachBtn.addEventListener('click', function() {
            // Show notification that this feature is coming soon
            showToast('Feature coming soon', 'info');
        });
    }

    // File dropping area
    if (messagesContainer) {
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            messagesContainer.addEventListener(eventName, preventDefaults, false);
        });
        
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        ['dragenter', 'dragover'].forEach(eventName => {
            messagesContainer.addEventListener(eventName, highlight, false);
        });
        
        ['dragleave', 'drop'].forEach(eventName => {
            messagesContainer.addEventListener(eventName, unhighlight, false);
        });
        
        function highlight() {
            messagesContainer.classList.add('bg-base-300');
        }
        
        function unhighlight() {
            messagesContainer.classList.remove('bg-base-300');
        }
        
        messagesContainer.addEventListener('drop', handleDrop, false);
        
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            
            if (files.length > 0) {
                // Show notification that this feature is coming soon
                showToast('File upload coming soon', 'info');
            }
        }
    }

    // Functions

    function createSession(subjectId) {
        // Show loading animation
        showLoadingState();
        
        $.ajax({
            url: '/chat/session',
            type: 'POST',
            data: { subject_id: subjectId },
            dataType: 'json',
            success: function(data) {
                // Add to sidebar
                addSessionToSidebar(data);
                
                // Load the new session
                loadSession(data.id);
                
                // Update URL
                updateUrlWithSessionId(data.id);
            },
            error: function(xhr) {
                showToast('Failed to create chat session: ' + xhr.responseJSON?.message, 'error');
                
                // Show empty state again on failure
                chatContainer.classList.add('hidden');
                emptyState.classList.remove('hidden');
            }
        });
    }

    function createSessionWithPreset(subjectId, presetText) {
        // Show loading animation
        showLoadingState();
        
        $.ajax({
            url: '/chat/session',
            type: 'POST',
            data: { subject_id: subjectId },
            dataType: 'json',
            success: function(data) {
                // Add to sidebar
                addSessionToSidebar(data);
                
                // Update URL
                updateUrlWithSessionId(data.id);
                
                // Load the new session
                loadSession(data.id, function() {
                    // After loading, send the preset message
                    const introMessage = getPresetMessage(presetText);
                    sendMessage(data.id, introMessage);
                });
            },
            error: function(xhr) {
                showToast('Failed to create chat session: ' + xhr.responseJSON?.message, 'error');
                
                // Show empty state again on failure
                chatContainer.classList.add('hidden');
                emptyState.classList.remove('hidden');
            }
        });
    }

    function getPresetMessage(presetType) {
        // Map preset titles to actual messages
        const presetMessages = {
            'Explain complex concepts': 'Can you help me understand the concept of [topic]? Please explain it in simple terms with examples.',
            'Help with problem solving': 'I need help solving this problem: [describe problem]. Can you walk me through the solution step by step?',
            'Quiz me on a topic': 'Could you quiz me on [subject]? Ask me a series of questions and let me try to answer them.'
        };
        
        return presetMessages[presetType] || 'Hello, I would like to learn about this subject. Where should I start?';
    }

    function addSessionToSidebar(session) {
        // Create new list item
        const newSessionItem = document.createElement('li');
        newSessionItem.className = 'session-item hover:bg-base-200 rounded-lg mb-1';
        newSessionItem.dataset.id = session.id;
        
        // Format date for display
        const updatedAt = new Date(session.updated_at || new Date());
        const formattedDate = updatedAt.toLocaleString();
        
        newSessionItem.innerHTML = `
            <a class="flex justify-between group py-3">
                <div class="flex flex-col overflow-hidden">
                    <span class="truncate font-medium">${session.title}</span>
                    <span class="text-xs text-base-content/60 truncate">Just now</span>
                </div>
                <div class="session-actions flex opacity-0 group-hover:opacity-100 transition-opacity duration-200 gap-1 ml-2">
                    <button class="rename-session btn btn-ghost btn-xs btn-circle" data-id="${session.id}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </button>
                    <button class="delete-session btn btn-ghost btn-xs btn-circle text-error" data-id="${session.id}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </a>
        `;
        
        // Add at the beginning of the list
        const sessionList = document.querySelector('.menu.menu-sm.w-full');
        if (sessionList) {
            sessionList.prepend(newSessionItem);
        }
    }

    function loadSession(sessionId, callback) {
        $.ajax({
            url: `/chat/session/${sessionId}`,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                currentSessionId = data.id;
                
                // Highlight selected session
                document.querySelectorAll('.session-item').forEach(el => {
                    el.classList.remove('active');
                });
                
                const currentSession = document.querySelector(`.session-item[data-id="${data.id}"]`);
                if (currentSession) {
                    currentSession.classList.add('active', 'bg-base-200', 'border-l-2', 'border-primary');
                }
                
                // Update UI
                updateSessionTitles(data.title);
                messagesContainer.innerHTML = '';
                
                // Show chat container, hide empty state
                emptyState.classList.add('hidden');
                chatContainer.classList.remove('hidden');
                
                // Close mobile drawer if open
                if (window.innerWidth < 1024) {
                    document.getElementById('sidebar-drawer').checked = false;
                }
                
                // Update status
                updateSessionStatus(data.status, data.error_context);
                
                // Add messages
                if (data.messages && data.messages.length > 0) {
                    data.messages.forEach(function(message) {
                        addMessage(message);
                    });
                    
                    // Store timestamp of last message
                    lastMessageTimestamp = new Date(data.messages[data.messages.length - 1].created_at).getTime();
                    
                    // Scroll to bottom
                    scrollToBottom();
                }
                
                // Enable/disable input
                updateInputState(data.status);
                
                // Start polling for status updates if needed
                if (data.status === 'busy') {
                    startStatusPolling(data.id);
                }
                
                // Execute callback if provided
                if (typeof callback === 'function') {
                    callback();
                }
            },
            error: function(xhr) {
                showToast('Failed to load chat session: ' + xhr.responseJSON?.message, 'error');
                
                // Show empty state on error
                chatContainer.classList.add('hidden');
                emptyState.classList.remove('hidden');
            }
        });
    }

    function renameSession(sessionId, title) {
        $.ajax({
            url: `/chat/session/${sessionId}`,
            type: 'PATCH',
            data: { title: title },
            dataType: 'json',
            success: function(data) {
                // Update sidebar
                const sessionItem = document.querySelector(`.session-item[data-id="${data.id}"]`);
                if (sessionItem) {
                    sessionItem.querySelector('.truncate').textContent = data.title;
                }
                
                // Update header if this is the current session
                if (currentSessionId === data.id) {
                    updateSessionTitles(data.title);
                }
                
                showToast('Session renamed successfully', 'success');
            },
            error: function(xhr) {
                showToast('Failed to rename chat session: ' + xhr.responseJSON?.message, 'error');
            }
        });
    }

    function deleteSession(sessionId) {
        $.ajax({
            url: `/chat/session/${sessionId}`,
            type: 'DELETE',
            dataType: 'json',
            success: function() {
                // Remove from sidebar
                const sessionItem = document.querySelector(`.session-item[data-id="${sessionId}"]`);
                if (sessionItem) {
                    // Add fade-out animation
                    sessionItem.classList.add('opacity-0', 'transition-opacity');
                    // Remove after animation
                    setTimeout(() => {
                        sessionItem.remove();
                    }, 300);
                }
                
                // If this was the current session, show empty state
                if (currentSessionId === sessionId) {
                    currentSessionId = null;
                    chatContainer.classList.add('hidden');
                    emptyState.classList.remove('hidden');
                    
                    // Stop polling
                    stopStatusPolling();
                    
                    // Update URL
                    history.pushState({}, '', window.location.pathname);
                }
                
                // If there are no sessions left
                if (document.querySelectorAll('.session-item').length === 0) {
                    emptyState.classList.remove('hidden');
                    chatContainer.classList.add('hidden');
                }
                
                showToast('Session deleted', 'success');
            },
            error: function(xhr) {
                showToast('Failed to delete chat session: ' + xhr.responseJSON?.message, 'error');
            }
        });
    }

    function sendMessage(sessionId, message) {
        // Add user message immediately with temporary ID
        const userMessage = {
            id: 'temp-' + Date.now(),
            chat_session_id: sessionId,
            sender: 'user',
            content: message,
            edited_flag: false,
            created_at: new Date().toISOString()
        };
        
        addMessage(userMessage);
        lastMessageTimestamp = Date.now();    
        scrollToBottom();
        
        // Disable input
        updateInputState('busy');
        
        // Add typing indicator
        addTypingIndicator();
        
        $.ajax({
            url: '/chat/messages',
            type: 'POST',
            data: {
                session_id: sessionId,
                content: message
            },
            dataType: 'json',
            success: function(data) {
                // Start polling for status updates
                startStatusPolling(sessionId);
            },
            error: function(xhr) {
                // Remove typing indicator
                removeTypingIndicator();
                
                // Show error message
                updateSessionStatus('error', xhr.responseJSON?.message || 'Failed to send message');
                
                // Enable input
                updateInputState('ready');
                
                showToast('Failed to send message', 'error');
            }
        });
    }

    function editMessage(messageId, content) {
        $.ajax({
            url: `/chat/messages/${messageId}`,
            type: 'PATCH',
            data: { content: content },
            dataType: 'json',
            success: function(data) {
                // Update message in the UI
                const messageEl = document.querySelector(`.message[data-id="${data.id}"]`);
                
                if (messageEl) {
                    if (data.sender === 'user') {
                        messageEl.querySelector('.message-content').textContent = data.content;
                    } else {
                        // AI message with potential markdown
                        messageEl.querySelector('.message-content').innerHTML = data.format === 'markdown' ? 
                            marked.parse(data.content) : data.content;
                    }
                    
                    const editedIndicator = messageEl.querySelector('.edited-indicator');
                    if (editedIndicator) {
                        editedIndicator.classList.remove('hidden');
                    }
                }
                
                // If this was a user message, trigger a new AI response
                if (data.sender === 'user') {
                    // Remove subsequent messages
                    let found = false;
                    document.querySelectorAll('.message').forEach(el => {
                        if (found) {
                            // Add fade-out animation
                            el.classList.add('opacity-0', 'transition-opacity');
                            // Remove after animation
                            setTimeout(() => {
                                el.remove();
                            }, 300);
                        }
                        if (el.dataset.id === data.id) {
                            found = true;
                        }
                    });
                    
                    // Remove typing indicator if present
                    removeTypingIndicator();
                    
                    // Add typing indicator
                    addTypingIndicator();
                    
                    // Start polling
                    startStatusPolling(currentSessionId);
                }
                
                showToast('Message updated', 'success');
            },
            error: function(xhr) {
                showToast('Failed to edit message: ' + xhr.responseJSON?.message, 'error');
            }
        });
    }

    function addMessage(message) {
        let template = message.sender === 'user' ? userMessageTemplate : aiMessageTemplate;
        
        let formattedContent = message.content;
        if (message.sender === 'ai' && message.format === 'markdown') {
            // Convert markdown to HTML
            formattedContent = marked.parse(message.content);
        }
        
        // Format the timestamp
        const timestamp = formatTime(message.created_at);
        
        let html = template
            .replace(/\{id\}/g, message.id)
            .replace(/\{content\}/g, formattedContent)
            .replace(/\{time\}/g, timestamp);
        
        if (message.edited_flag) {
            html = html.replace('hidden edited-indicator', 'edited-indicator');
        }
        
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = html;
        const messageElement = tempDiv.firstElementChild;
        
        // Add animation class
        messageElement.classList.add('animate-fade-in');
        
        messagesContainer.appendChild(messageElement);
        
        // Apply additional formatting for AI messages
        if (message.sender === 'ai' && message.format === 'markdown') {
            // Render math if KaTeX is available
            if (typeof renderMathInElement === 'function') {
                setTimeout(() => {
                    renderMathInElement(messageElement.querySelector('.message-content'), {
                        delimiters: [
                            {left: "$$", right: "$$", display: true},
                            {left: "$", right: "$", display: false},
                            {left: "\\(", right: "\\)", display: false},
                            {left: "\\[", right: "\\]", display: true}
                        ],
                        throwOnError: false
                    });
                }, 0);
            }
            
            // Highlight code blocks if highlight.js is available
            if (typeof hljs !== 'undefined') {
                messageElement.querySelectorAll('pre code').forEach((block) => {
                    hljs.highlightElement(block);
                });
            }
        }
    }

    function addTypingIndicator() {
        // Remove existing indicator if present
        removeTypingIndicator();
        
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = typingIndicatorTemplate;
        const indicator = tempDiv.firstElementChild;
        
        // Add animation class
        indicator.classList.add('animate-fade-in');
        
        messagesContainer.appendChild(indicator);
        
        scrollToBottom();
    }

    function removeTypingIndicator() {
        const typingIndicator = document.querySelector('.ai-typing');
        if (typingIndicator) {
            // Add fade-out animation
            typingIndicator.classList.add('opacity-0', 'transition-opacity');
            
            // Remove after animation
            setTimeout(() => {
                typingIndicator.remove();
            }, 300);
        }
    }

    function formatTime(dateString) {
        if (!dateString) return '';
        
        const date = new Date(dateString);
        const now = new Date();
        
        // Check if it's today
        if (date.toDateString() === now.toDateString()) {
            return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        } else {
            return date.toLocaleDateString([], { month: 'short', day: 'numeric' }) + ' ' + 
                   date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        }
    }

    function scrollToBottom() {
        // Smooth scroll to bottom
        messagesContainer.scrollTo({
            top: messagesContainer.scrollHeight,
            behavior: 'smooth'
        });
    }

    function startStatusPolling(sessionId) {
        // Clear existing timer
        stopStatusPolling();
        
        // Start new polling
        pollingTimer = setInterval(function() {
            checkSessionStatus(sessionId);
        }, pollingInterval);
    }

    function stopStatusPolling() {
        if (pollingTimer) {
            clearInterval(pollingTimer);
            pollingTimer = null;
        }
    }

    function checkSessionStatus(sessionId) {
        $.ajax({
            url: `/chat/session/${sessionId}/status`,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Update status
                updateSessionStatus(data.status, data.error_context);
                
                // If new messages are available, refresh the session
                if (data.has_new_messages) {
                    fetchNewMessages(sessionId);
                }
                
                // If processing is complete, stop polling
                if (data.status !== 'busy') {
                    stopStatusPolling();
                    
                    // Remove typing indicator
                    removeTypingIndicator();
                    
                    // Enable input if status is ready
                    updateInputState(data.status);
                }
            },
            error: function(xhr) {
                // Stop polling on error
                stopStatusPolling();
                
                // Show error
                updateSessionStatus('error', 'Failed to check session status');
                
                // Enable input
                updateInputState('ready');
            }
        });
    }

    function fetchNewMessages(sessionId) {
    $.get(`/chat/session/${sessionId}/messages`, { after: lastMessageTimestamp })
        .done(data => {
        data.messages
            .filter(m => m.sender === 'ai')    // ← ignore user echoes
            .forEach(addMessage);
        if (data.messages.length) {
            lastMessageTimestamp =
            new Date(data.messages.slice(-1)[0].created_at).getTime();
            scrollToBottom();
        }
        });
    }

    function updateSessionStatus(status, errorContext) {
        // Hide error banner by default
        errorBanner.classList.add('hidden');
        if (errorControls) errorControls.classList.add('hidden');
        
        switch (status) {
            case 'busy':
                // Show typing indicator if not present
                if (!document.querySelector('.ai-typing')) {
                    addTypingIndicator();
                }
                break;
                
            case 'error':
                // Show error banner and controls
                errorBanner.classList.remove('hidden');
                errorMessage.textContent = errorContext || 'An error occurred';
                if (errorControls) errorControls.classList.remove('hidden');
                
                // Remove typing indicator
                removeTypingIndicator();
                break;
                
            case 'ready':
                // Remove typing indicator
                removeTypingIndicator();
                break;
        }
    }

    function updateInputState(status) {
        if (!messageInput) return;
        
        if (status === 'busy') {
            messageInput.disabled = true;
            messageInput.classList.add('bg-base-200');
            
            if (messageForm) {
                messageForm.querySelector('button[type="submit"]').disabled = true;
            }
        } else {
            messageInput.disabled = false;
            messageInput.classList.remove('bg-base-200');
            
            if (messageForm) {
                messageForm.querySelector('button[type="submit"]').disabled = false;
            }
            
            messageInput.focus();
        }
    }

    function retryProcessing(sessionId) {
        if (!sessionId) return;
        
        $.ajax({
            url: `/chat/session/${sessionId}/retry`,
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                // Hide error
                errorBanner.classList.add('hidden');
                if (errorControls) errorControls.classList.add('hidden');
                
                // Update status
                updateSessionStatus('busy');
                
                // Start polling
                startStatusPolling(sessionId);
            },
            error: function(xhr) {
                showToast('Failed to retry: ' + xhr.responseJSON?.message, 'error');
            }
        });
    }

    function restartProcessing(sessionId) {
        if (!sessionId) return;
        
        $.ajax({
            url: `/chat/session/${sessionId}/restart`,
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                // Hide error
                errorBanner.classList.add('hidden');
                if (errorControls) errorControls.classList.add('hidden');
                
                // Update status
                updateSessionStatus('busy');
                
                // Add fade-out animation to AI messages
                document.querySelectorAll('.message.ai-message').forEach(el => {
                    el.classList.add('opacity-0', 'transition-opacity');
                    // Remove after animation
                    setTimeout(() => {
                        el.remove();
                    }, 300);
                });
                
                // Add typing indicator after a delay
                setTimeout(() => {
                    addTypingIndicator();
                    
                    // Start polling
                    startStatusPolling(sessionId);
                }, 400);
            },
            error: function(xhr) {
                showToast('Failed to restart: ' + xhr.responseJSON?.message, 'error');
            }
        });
    }

    // URL handling for direct conversation access
    function updateUrlWithSessionId(sessionId) {
        if (history.pushState) {
            const newUrl = window.location.pathname + '?session=' + sessionId;
            history.pushState({sessionId: sessionId}, '', newUrl);
        }
    }

    // Handle browser navigation events
    window.addEventListener('popstate', function(event) {
        if (event.state && event.state.sessionId) {
            loadSession(event.state.sessionId);
        } else {
            // Get session from URL or show empty state
            const sessionId = getSessionIdFromUrl();
            if (sessionId) {
                loadSession(sessionId);
            } else {
                currentSessionId = null;
                chatContainer.classList.add('hidden');
                emptyState.classList.remove('hidden');
            }
        }
    });

    function getSessionIdFromUrl() {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get('session');
    }

    function showToast(message, type = 'info') {
        // Create toast notification
        const toast = document.createElement('div');
        toast.className = `toast toast-end z-50`;
        
        let bgColor = '';
        switch(type) {
            case 'success': 
                bgColor = 'alert-success'; 
                break;
            case 'error': 
                bgColor = 'alert-error'; 
                break;
            case 'warning': 
                bgColor = 'alert-warning'; 
                break;
            default: 
                bgColor = 'alert-info';
        }
        
        toast.innerHTML = `
            <div class="alert ${bgColor}">
                <span>${message}</span>
            </div>
        `;
        
        // Set initial opacity to 0
        toast.style.opacity = '0';
        
        // Add to DOM
        document.body.appendChild(toast);
        
        // Trigger animation
        setTimeout(() => {
            toast.style.opacity = '1';
            toast.style.transition = 'opacity 0.3s ease-in-out';
        }, 10);
        
        // Remove after 3 seconds with fade out
        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    // Add animation styles
    const style = document.createElement('style');
    style.textContent = `
        .animate-fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .transition-opacity {
            transition: opacity 0.3s ease-in-out;
        }
    `;
    document.head.appendChild(style);

    // Initialize - check if there's a session ID in the URL
    function initialize() {
        const sessionId = getSessionIdFromUrl();
        
        if (sessionId) {
            // Show loading state
            showLoadingState();
            
            // Load specified session with a delay to show loading animation
            setTimeout(() => {
                loadSession(sessionId);
            }, 500);
        } else {
            // No specific session requested - show empty state
            emptyState.classList.remove('hidden');
            chatContainer.classList.add('hidden');
        }
    }

    // Run initialization
    initialize();
});

</script>
    
@endsection
