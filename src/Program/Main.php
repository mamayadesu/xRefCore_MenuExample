<?php

namespace Program;

use IO\Console;
use CliForms\MenuBox\MenuBox;
use CliForms\MenuBox\MenuBoxItem;
use Data\String\BackgroundColors;
use Data\String\ForegroundColors;

class Main
{
    public function __construct(array $args)
    {
        $menu = new MenuBox("oOoOoOo My First Menu oOoOoOo", $this);
        $menu->SetClearWindowOnRender(true);
        $menu->SetDescription("This is an example of menu");
        $menu->SetInputTitle("Input item number and press Enter, honey");
        $menu->SetWrongItemTitle("Item with same number doesn't exist. Please, try again, dear!");
        
        $menu->
            AddItem((new MenuBoxItem("Hello world", function(MenuBox $menu)
            {
                $this->HelloWorld();
            })))->
            
            AddItem((new MenuBoxItem("foo bar", function(MenuBox $menu)
            {
                $this->foobar();
            }))->SetHeaderStyle(ForegroundColors::CYAN)->SetItemStyle(ForegroundColors::PURPLE, BackgroundColors::YELLOW))->
            
            AddItem((new MenuBoxItem("Third item", function(MenuBox $menu)
            {
                $this->AnyIdeaToMethodName();
            })))->
            
            SetZeroItem((new MenuBoxItem("Close Menu", function(MenuBox $menu)
            {
                $menu->Close();
            })));
            
        $menu->Render();
        
        /*
         * Or you can use next variant:
         * 
         * do
         * {
         *     ($menu->Render2())($menu);
         * }
         * while (!$menu->IsClosed());
         */
        
        sleep(1);
        Console::WriteLine("Press ENTER to exit");
        Console::ReadLine();
    }
    
    public function HelloWorld() : void
    {
        Console::WriteLine("Oh, hello world!");
    }
    
    public function foobar() : void
    {
        Console::WriteLine("Foo Bar");
    }
    
    public function AnyIdeaToMethodName() : void
    {
        Console::WriteLine("s a m p l e t e x t");
    }
}