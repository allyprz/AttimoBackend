<nav class="bg-clr-dark-blue justify-between w-full flex px-16 text-clr-white items-center">
    <span>Attimo</span>
    <section class="flex gap-4 duration-150">
        <a href="{{ route('activities.index') }}" class="p-3 hover:bg-[#13223b] h-full cursor-pointer">Activities</a>
        <a href="{{ route('majors.index') }}" class="p-3 hover:bg-[#13223b] h-full cursor-pointer">Majors</a>
        <a href="{{ route('courses.index') }}" class="p-3 hover:bg-[#13223b] h-full cursor-pointer">Courses</a>
        <a href="{{ route('groups.index') }}" class="p-3 hover:bg-[#13223b] h-full cursor-pointer">Groups</a>
        <a href="{{ route('users.index') }}" class="p-3 hover:bg-[#13223b] h-full cursor-pointer">Users</a>
        <a href="#" class="p-3 hover:bg-[#13223b] h-full cursor-pointer">Logout</a>
    </section>
</nav>